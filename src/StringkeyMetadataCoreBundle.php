<?php declare(strict_types=1);

namespace Stringkey\MetadataCoreBundle;

use Stringkey\MetadataCoreBundle\DependencyInjection\StringkeyMetadataCoreExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class StringkeyMetadataCoreBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new StringkeyMetadataCoreExtension();
        }

        return $this->extension;
    }
}
