<?php
namespace Cl\Able\Proxiable\Subjectable;

use \Cl\Able\Proxiable\Exception\ProxiableException;

trait SubjectableProxyMagicTrait
{
    /**
     * Self or Subject call
     *
     * @param string $method 
     * @param mixed  $parameters 
     * 
     * @return mixed
     * @throws ProxiableException
     */
    public function __call(string $method, array $parameters): mixed
    {
        
        try {
            match (true) {
                method_exists($this->getSubjectClass(), "__call") => $result = $this->getSubject()->__call($method, $parameters),
                method_exists($this, $method) && !strcmp("__call", $method) => $result = $this->$method(...$parameters),
                default => $result = $this->getSubject()->$method(...$parameters)
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $result;
    }

    /**
     * Getter for Self or Subject property
     *
     * @param string $name 
     * 
     * @return mixed
     * @throws ProxiableException
     */
    public function __get(string $name): mixed
    {
        try {
            match (true) {
                method_exists($this->$this->getSubjectClass(), "__get") => $value = $this->getSubject()->__get($name),
                property_exists($this->getSubjectClass(), $name) => $value = $this->getSubject()->$name,
                //@note dynamic properies are deprecated since php 8.2
                default => $value = $this->$name
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $value;
    }

    /**
     * Setter for Self or Subject property
     *
     * @param string $name 
     * @param mixed  $value 
     * 
     * @return void
     * @throws ProxiableException
     */
    public function __set(string $name, mixed $value): void
    {
        try {
            match (true) {
                method_exists($this->getSubjectClass(), "__set") => $this->getSubject()->__set($name, $value),
                property_exists($this->getSubjectClass(), $name) => $this->getSubject()->$name = $value,
                //@note dynamic properies are deprecated since php 8.2
                default => $this->$name = $value,
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
    }

    public function __isset(string $name): bool
    {
        try {
            match (true) {
                isset($this->$name) => $result = isset($this->$name),
                method_exists($this->getSubjectClass(), "__isset") => $result = $this->getSubject()->__isset($name),
                default => $result = isset($this->getSubject()->$name)
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $result;
    }

    public function __unset(string $name): void
    {
        try {
            match (true) {
                //isset($this->$name) => unset($this->$name),
                method_exists($this->getSubjectClass(), "__unset") => $this->getSubject()->__unset($name),
                isset($this->getSubject()->$name) => (function ($name) {
                    unset($this->getSubject()->$name);
                })($name),
                default => null
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
    }

    public function __sleep(): array
    { //@TODO serialize self
        try {
            $result = [];
            match (true) {
                method_exists($this->getSubjectClass(), "__sleep") => $result = $this->getSubject()->__sleep(),
                //@TODO
                //true => array_merge(["\0*\0subjectClass"], $result),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $result;
    }

    public function __wakeup(): void
    { //@TODO unserialize self
        try {
            match (true) {
                method_exists($this->getSubjectClass(), "__wakeup") => $this->getSubject()->__wakeup(),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
    }
    
    public function __serialize(): array
    { //@TODO serialize self
        try {
            match (true) {
                method_exists($this->getSubjectClass(), "__serialize") => $result = $this->getSubject()->__serialize(),
                //@TODO
                //true => array_merge(["\0*\0subjectClass"], $result),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $result;
    }

    public function __unserialize(array $data): void
    {
        try {
            match (true) {
                method_exists($this->getSubjectClass(), "__unserialize") => $this->getSubject()->__unserialize(),
                //@TODO
                //true => array_merge(["\0*\0subjectClass"], $result),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
    }

    public function __toString(): string
    {
        try {
            match (true) {
                method_exists($this->getSubjectClass(), "__toString") => $result = $this->getSubject()->__toString(),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $result;
    }
    
    public function __invoke(): mixed
    {
        try {
            match (true) {
                method_exists($this->getSubject(), "__invoke") => $result = $this->getSubject()->__invoke(),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
        return $result;
    }
    
    // public static function __set_state(array $properties): object
    // {
    // }
    
    // public function __debugInfo(): array
    // {
    // }
    

    /**
     * Destructor
     */
    public function __destruct()
    {
        try {
            match (true) {
                //do not trigger __destruct() for non initialized subject
                $this->subject 
                && method_exists($this->getSubject(), "__destruct") => $this->getSubject()->__destruct(),
                default => true
            };
        } catch (\Throwable $e) {
            throw new ProxiableException($this, $e);
        }
    }
}