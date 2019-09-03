<?php

namespace MichielKempen\LaravelMorphable\Tests;

use MichielKempen\LaravelMorphable\NoFactoryException;
use MichielKempen\LaravelMorphable\Tests\Support\TestModelWithoutFactory;
use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TestModel;
use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TypeAModel;
use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TypeBModel;
use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TypeCModel;

class MorphableTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_when_no_factory_is_specified()
    {
        $this->expectException(NoFactoryException::class);

        TestModelWithoutFactory::create([
            'type' => 'a',
            'kind' => 'a',
            'configuration' => [
                'a' => 123
            ]
        ]);
    }
}