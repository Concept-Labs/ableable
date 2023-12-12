<?php
namespace Cl\Able\Proxiable\Extendable;

use Cl\Able\Proxiable\ProxiableException;

trait ExtendableProxyTrait
{
    protected bool $___instantiated = false;

    protected function ___isInstantiated(): bool
    {
        return $this->___instantiated;
    }

    protected function ___instantiate()
    {

    }

    private function ___hasParentConstructor()
    {
        // if ((new \ReflectionMethod($this->___subjectClass, parent::class))->isPublic()) {
        //     return true;
        // }
        try {
            return (new \ReflectionMethod(parent::class, '__construct'))->isConstructor();
        } catch (\ReflectionException $e) {
            //has no constructor
        }
        return false;
    }
}