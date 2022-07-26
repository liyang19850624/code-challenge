<?php

namespace CodeChallenge\Traits;

use ReflectionClass;

trait CallPrivate
{
    /**
     * get private property from object
     * @param Object $object
     * @param string $propertyName
     * 
     * @return mixed
     */
    private function getPrivateProperty(Object $object, string $propertyName): mixed
    {
        $class = new ReflectionClass($object::class);
        $property = $class->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}
