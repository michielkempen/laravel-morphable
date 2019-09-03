<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\TypeField;

class TypeAModel extends TestModel
{
    public function getA(): string
    {
        return $this->configuration['a'];
    }
}