<?php

namespace Stringkey\MetadataCoreBundle\Types;

use Doctrine\DBAL\Types\JsonType;

class ArrayType extends JsonType
{
    public function getName()
    {
        return 'array';
    }
}