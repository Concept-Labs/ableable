<?php
namespace Cl\Able\Singletonable;

trait SingletonableTrait
{
    /**
     * Self instance
     *
     * @var SingletonableInterface
     */
    private static ?SingletonableInterface $_singletonInstatnce = null;

    /**
     * Self singleton
     *
     * @param mixed ...$args 
     * 
     * @return SingletonableInterface
     */
    public static function singleton(...$args)
    {
        if (!static::$_singletonInstatnce instanceof SingletonableInterface) {
                static::$_singletonInstatnce = new static(...$args);
        }
        return static::$_singletonInstatnce;
    }
}