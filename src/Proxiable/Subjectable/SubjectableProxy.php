<?php
namespace Cl\Able\Proxiable\Subjectable;


abstract class SubjectableProxy implements SubjectableProxyInterface
{
    /**
     * Body trait
     */
    use SubjectableProxyTrait;
    
    /**
     * Magic methods trait
     */
    use SubjectableProxyMagicTrait;

    /**
     * Subject class
     *
     * @property string|null $subjectClass
     */
    protected ?string $subjectClass = null;

    /**
     * Subject Instance
     *
     * @property ?SubjectableInterface $subject
     */
    protected ?SubjectableInterface $subject = null;

    /**
     * Subject constructor parameters
     *
     * @var array|null
     */
    protected ?array $subjectConstructorParameterssubjectClass = null;

    /**
     * Proxy constructor
     *
     * @param string|\Stringable $subjectClass 
     * @param mixed              ...$parameters 
     */
    public function __construct(string $subjectClass, mixed ...$parameters)
    {
        $this->subjectClass = $subjectClass;
        $this->subjectConstructorParameterssubjectClass = $parameters;
    }

    
}