<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\TypeField;

use Illuminate\Database\Eloquent\Model;
use MichielKempen\LaravelMorphable\Morphable;

class TestModel extends Model
{
    use Morphable;

    protected $guarded = [];

    protected $table = 'test_models';

    protected $factory = ModelFactory::class;

    protected $casts = [
        'configuration' => 'json',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }
}