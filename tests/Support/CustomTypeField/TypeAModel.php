<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField;

class TypeAModel extends TestModel
{
    public function getA(): string
    {
        return $this->configuration['a'];
    }
}