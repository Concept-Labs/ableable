<?php

namespace Cl\Able\Proxiable\Extendable;

use Cl\Able\Proxiable\Extendable\ExtendableProxyInterface;
use Cl\Able\Proxiable\Exception\ProxiableException;


trait ExtendableTrait
{

    use \Cl\Able\Proxiable\ProxiableTrait;

    public static function proxify(mixed ...$parameters): ExtendableProxyInterface
    {
        die('proxify');

        if (!class_alias(static::class, 'SelfExtendableProxy', false)) {
            die('class alias');
            //@TODO
            //throw new ProxiableException(new class(), new \Exception(), "Unable to add class alias");
        }


        $proxy = new class (...$parameters) extends \SelfExtendableProxy implements ExtendableProxyInterface {
            
            use ExtendableProxyTrait;
            
            private array $___constructorParameters = [];
            private bool $___initialized = false;
            public function __construct(...$parameters)
            {
                $this->___constructorParameters = $parameters;
            }

        };
        class_alias(static::class, '', false);
        
        return $proxy;
    }
}