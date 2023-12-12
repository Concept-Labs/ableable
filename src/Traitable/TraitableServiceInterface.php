<?php

namespace Cl\Able\Traitable;

interface TraitableServiceInterface
{
    /**
     * Traitify class with traits declared as Interfaces on class definitions
     *
     * @param string|\Stringable $class Class name
     * @param mixed              $meta  Meta data
     * 
     * @return void
     */
    public static function traitify(string|\Stringable $class, mixed $meta = null);
}