<?php

namespace MichielKempen\LaravelMorphable\Tests\Support\TypeField;

use Illuminate\Database\Eloquent\Model;
use MichielKempen\LaravelMorphable\MorphableModelFactory;

class ModelFactory implements MorphableModelFactory
{
    public static function create(string $type): Model
    {
        $mapping = [
            'a' => TypeAModel::class,
            'b' => TypeBModel::class,
            'c' => TypeCModel::class,
        ];

        return app($mapping[$type]);
    }
}
