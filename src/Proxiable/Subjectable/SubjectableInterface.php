<?php
namespace Cl\Able\Proxiable\Subjectable;

use Cl\Able\Proxiable\ProxiableInterface;



interface SubjectableInterface extends ProxiableInterface
{
    /**
     * Get Subjectable Proxy
     *
     * @param mixed ...$parameters 
     * 
     * @return SubjectableProxyInterface
     */
    public static function subjectify(mixed ...$parameters);
}