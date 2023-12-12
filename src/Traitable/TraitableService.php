<?php

namespace Cl\Able\Traitable;

use Cl\Able\Traitable\TraitableInterface;

/**
 * Traitable Service class
 */
class TraitableService implements TraitableServiceInterface
{
    private const ABLEABLE_INTERFACE_NAME_REGEX = '/^?ableInterface$/i';
    /**
     * {@inheritDoc}
     */
    public static function traitify(string|\Stringable $class, mixed $meta = null)
    {
        //[$constructorParameters, $metaData] = $meta;

        $reflectionClass = new \ReflectionClass($class);
        if ($reflectionClass->isInstantiable()
            && $reflectionClass->implementsInterface(TraitableInterface::class)
        ) {
            $a= new \RegexIterator(
                new \ArrayIterator($reflectionClass->getInterfaceNames()),
                static::ABLEABLE_INTERFACE_NAME_REGEX
            );
            foreach($a as $b)
               var_dump($b);
            $traits = array_reduce(
                (array) new \RegexIterator(
                    new \ArrayIterator($reflectionClass->getInterfaceNames()),
                    static::ABLEABLE_INTERFACE_NAME_REGEX
                ),
                function($traits, $item) {
                    var_dump($item);
                    $traits[] = preg_replace('/Interface$/', 'Trait', $item);
                }
            );
            var_dump($traits);
            var_dump('here');
        }
    }

}