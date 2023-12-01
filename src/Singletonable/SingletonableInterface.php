<?php
namespace Cl\Core\Singletonable;
use Cl\Core\Traitable\TraitableInterface;

interface SingletonableInterface extends TraitableInterface
{
    /**
     * Self singleton
     *
     * @param mixed ...$args 
     * 
     * @return SingletonableInterface
     */
    public static function singleton(...$args);
}