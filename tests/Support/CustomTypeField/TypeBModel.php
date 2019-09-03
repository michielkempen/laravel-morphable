<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField;

class TypeBModel extends TestModel
{
    public function getB(): string
    {
        return $this->configuration['b'];
    }
}