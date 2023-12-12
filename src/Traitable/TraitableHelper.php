<?php

class TraitableHelper
{
    /**
     * Get "ableable" interface names
     *
     * @param \ReflectionClass $reflectionClass
     * 
     * @return \Iterator
     */
    public static function getInterfacesRegex(\ReflectionClass $reflectionClass, string $regex)
    {
        return new \RegexIterator(
            new \ArrayIterator($reflectionClass->getInterfaceNames()),
            $regex
        );
    }

    public static function getAbleableTraitNames(\ReflectionClass $reflectionClass)
}