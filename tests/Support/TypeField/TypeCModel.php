<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\TypeField;

class TypeCModel extends TestModel
{
    public function getC(): string
    {
        return $this->configuration['c'];
    }
}