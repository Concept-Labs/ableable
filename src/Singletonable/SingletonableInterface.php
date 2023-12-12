<?php
namespace Cl\Able\Singletonable;
use Cl\Able\Traitable\TraitableInterface;

interface SingletonableInterface extends TraitableInterface
{
    /**
     * Self singleton
     *
     * @param mixed ...$args 
     * 
     * @return SingletonableInterface
     */
    public static function singletonify(...$args);
}