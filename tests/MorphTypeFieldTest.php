<?php

namespace MichielKempen\LaravelMorphable\Tests;

use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TestModel;
use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TypeAModel;
use MichielKempen\LaravelMorphable\Tests\Support\TypeField\TypeBModel;

class MorphTypeFieldTest extends TestCase
{
    /** @test */
    public function it_can_morph_a_newly_created_model()
    {
        /** @var TypeAModel $result */
        $result = TestModel::create([
            'type' => 'a',
            'kind' => 'b',
            'configuration' => [
                'a' => 123
            ]
        ]);

        $this->assertInstanceOf(TypeAModel::class, $result);
        $this->assertEquals('a', $result->getType());
        $this->assertEquals(123, $result->getA());

        /** @var TypeBModel $result */
        $result = TestModel::create([
            'type' => 'b',
            'kind' => 'c',
            'configuration' => [
                'b' => 321
            ]
        ]);

        $this->assertInstanceOf(TypeBModel::class, $result);
        $this->assertEquals('b', $result->getType());
        $this->assertEquals(321, $result->getB());
    }

    /** @test */
    public function it_can_retrieve_an_existing_model()
    {
        /** @var TypeAModel $result */
        $result = TestModel::create([
            'type' => 'a',
            'kind' => 'b',
            'configuration' => [
                'a' => 123
            ]
        ]);

        $result = TestModel::findOrFail($result->getId());

        $this->assertInstanceOf(TypeAModel::class, $result);
        $this->assertEquals('a', $result->getType());
        $this->assertEquals(123, $result->getA());

        /** @var TypeBModel $result */
        $result = TestModel::create([
            'type' => 'b',
            'kind' => 'a',
            'configuration' => [
                'b' => 321
            ]
        ]);

        $result = TestModel::findOrFail($result->getId());

        $this->assertInstanceOf(TypeBModel::class, $result);
        $this->assertEquals('b', $result->getType());
        $this->assertEquals(321, $result->getB());
    }
}
