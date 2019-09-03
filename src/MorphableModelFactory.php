<?php

namespace MichielKempen\LaravelMorphable;

use Illuminate\Database\Eloquent\Model;

interface MorphableModelFactory
{
    /**
     * @param string $type
     * @return Model
     */
    public static function create(string $type): Model;
}