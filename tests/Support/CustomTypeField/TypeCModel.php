<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField;

class TypeCModel extends TestModel
{
    public function getC(): string
    {
        return $this->configuration['c'];
    }
}