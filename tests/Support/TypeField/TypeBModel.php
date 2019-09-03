<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\TypeField;

class TypeBModel extends TestModel
{
    public function getB(): string
    {
        return $this->configuration['b'];
    }
}