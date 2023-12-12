<?php

namespace Cl\Able\Proxiable\Exception;
use Cl\Able\Proxiable\ProxyInterface;

class ProxiableException extends \RuntimeException
{
    /**
     * Constructor
     *
     * @param ProxyInterface $proxy 
     * @param \Throwable     $e 
     */
    public function __construct(ProxyInterface $proxy, \Throwable $e, ?string $additionalMessage = null)
    {
        parent::__construct(
            "Proxied class '{$proxy->getSubjectClass()}': {$additionalMessage}; {$e->getMessage()}",
            $e->getCode(),
            $e->getPrevious()
        );
    }
}