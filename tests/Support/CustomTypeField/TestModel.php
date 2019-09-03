<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\CustomTypeField;

use Illuminate\Database\Eloquent\Model;
use MichielKempen\LaravelMorphable\Morphable;

class TestModel extends Model
{
    use Morphable;

    protected $guarded = [];

    protected $table = 'test_models';

    protected $factory = ModelFactory::class;

    protected $typeField = 'kind';

    protected $casts = [
        'configuration' => 'json',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getKind(): string
    {
        return $this->kind;
    }
}