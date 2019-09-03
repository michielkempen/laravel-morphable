<?php

namespace MichielKempen\LaravelMorphable\Tests\Support;

use Illuminate\Database\Eloquent\Model;
use MichielKempen\LaravelMorphable\Morphable;

class TestModelWithoutFactory extends Model
{
    use Morphable;

    protected $guarded = [];

    protected $table = 'test_models';

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

    public function getKind(): string
    {
        return $this->kind;
    }
}