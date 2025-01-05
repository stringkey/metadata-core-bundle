<?php declare(strict_types=1);

namespace Stringkey\MetadataCoreBundle\Listener;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;

class MetadataTablePrefixListener
{
    private string $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    public function getSubscribedEvents(): array
    {
        return ['loadClassMetadata'];
    }

    // todo: find a smarter way to handle the prefix
    // maybe by having the service and the listener in the shared bundle but the configuration in the separate bundles
    // with the applicable class(es) configured

    private const bundles = [
        'Stringkey\MetadataCoreBundle\Entity',
        'Stringkey\OptionMapperBundle\Entity',
    ];

    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs): void
    {
        $classMetadata = $eventArgs->getClassMetadata();

        if (!in_array($classMetadata->namespace, self::bundles)) {
            return;
        }

        if (!$classMetadata->isInheritanceTypeSingleTable() || $classMetadata->getName() === $classMetadata->rootEntityName) {
            $classMetadata->setPrimaryTable([
                'name' => $this->prefix . $classMetadata->getTableName()
            ]);
        }

        $associationMappings = $classMetadata->getAssociationMappings();
        foreach ($associationMappings as $fieldName => $mapping) {
            if ($mapping['type'] == ClassMetadata::MANY_TO_MANY && $mapping['isOwningSide']) {
                $mappedTableName = $mapping['joinTable']['name'];
                $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
            }
        }
    }
}

