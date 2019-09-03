<?php

namespace MichielKempen\LaravelMorphable;

class NoFactoryException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Cannot instantiate a morphed model without a factory. Please specify a '\$factory' property on your morphable model.", 500);
    }
}