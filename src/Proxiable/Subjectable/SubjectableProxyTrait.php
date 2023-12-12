<?php
namespace Cl\Able\Proxiable\Subjectable;

use Cl\Able\Proxiable\Exception\ProxiableException;

trait SubjectableProxyTrait
{
    /**
     * @see SubjectableProxyInterface
     * @inheritDoc
     */
    public function getSubjectClass(): string
    {
        return $this->subjectClass;
    }

    public function getSubjectReflectionClass(): \ReflectionClass
    {
        if (!this->subjectReflectionMeta)
        return new \ReflectionClass($this->getSubjectClass());
    }

    /**
     * @see SubjectableProxyInterface
     * @inheritDoc
     */
    public function getSubjectConstructorParameters(): array|null
    {
        return $this->subjectConstructorParameterssubjectClass;
    }

    /**
     * @see SubjectableProxyInterface
     * @inheritDoc
     */
    public function getSubject(): SubjectableInterface
    {
        if (!$this->subject instanceof SubjectableInterface) {
            try {
                $subjectClass = $this->getSubjectClass(); // :/
                $this->subject = $this->()
                    = new $subjectClass(...$this->getSubjectConstructorParameters());
            } catch (\Throwable $e) {
                throw new ProxiableException($this, $e);
            }
        }
        return $this->subject;
    }

    public function setInstantiateStrategy(int $instantiateStrategy)
    {

    }

    public function fetchNew()
    {

    }

    public function fetchContainer()
    {

    }
}