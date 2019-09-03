<?php

namespace MichielKempen\LaravelMorphable\Tests;

use MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField\TestModel;
use MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField\TypeAModel;
use MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField\TypeBModel;

class MorphCustomTypeFieldTest extends TestCase
{
    /** @test */
    public function it_can_morph_a_newly_created_model_with_a_custom_type_field()
    {
        /** @var TypeAModel $result */
        $result = TestModel::create([
            'kind' => 'a',
            'type' => 'b',
            'configuration' => [
                'a' => 123
            ]
        ]);

        $this->assertInstanceOf(TypeAModel::class, $result);
        $this->assertEquals('a', $result->getKind());
        $this->assertEquals(123, $result->getA());

        /** @var TypeBModel $result */
        $result = TestModel::create([
            'kind' => 'b',
            'type' => 'c',
            'configuration' => [
                'b' => 321
            ]
        ]);

        $this->assertInstanceOf(TypeBModel::class, $result);
        $this->assertEquals('b', $result->getKind());
        $this->assertEquals(321, $result->getB());
    }

    /** @test */
    public function it_can_retrieve_an_existing_model_with_a_custom_type_field()
    {
        /** @var TypeAModel $result */
        $result = TestModel::create([
            'kind' => 'a',
            'type' => 'b',
            'configuration' => [
                'a' => 123
            ]
        ]);

        $result = TestModel::findOrFail($result->getId());

        $this->assertInstanceOf(TypeAModel::class, $result);
        $this->assertEquals('a', $result->getKind());
        $this->assertEquals(123, $result->getA());

        /** @var TypeBModel $result */
        $result = TestModel::create([
            'kind' => 'b',
            'type' => 'a',
            'configuration' => [
                'b' => 321
            ]
        ]);

        $result = TestModel::findOrFail($result->getId());

        $this->assertInstanceOf(TypeBModel::class, $result);
        $this->assertEquals('b', $result->getKind());
        $this->assertEquals(321, $result->getB());
    }
}