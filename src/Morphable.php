<?php

namespace MichielKempen\LaravelMorphable;

use Illuminate\Database\Eloquent\Model;

trait Morphable
{
    /**
     * @param array $attributes
     * @param bool $exists
     * @return Model
     * @throws NoFactoryException
     */
    public function newInstance($attributes = [], $exists = false)
    {
        return $this->getMorphModel($attributes, $exists);
    }

    /**
     * Create a new model instance that is existing.
     *
     * @param array $attributes
     * @param string|null $connection
     * @return Model
     * @throws NoFactoryException
     */
    public function newFromBuilder($attributes = [], $connection = null)
    {
        $model = $this->getMorphModel($attributes, true);
        $model->setRawAttributes((array) $attributes, true);
        $model->setConnection($connection ?: $this->getConnectionName());
        $model->fireModelEvent('retrieved', false);

        return $model;
    }

    /**
     * @param $attributes
     * @param bool $exists
     * @return Model
     * @throws NoFactoryException
     */
    protected function getMorphModel($attributes, bool $exists)
    {
        $typeField = property_exists($this, 'typeField')
            ? $this->typeField
            : 'type';

        $applicationType = ((array) $attributes)[$typeField] ?? null;

        if(is_null($applicationType)) {
            return parent::newInstance([], $exists);
        }

        if(! property_exists($this, 'factory')) {
            throw new NoFactoryException;
        }

        $factory = app($this->factory);

        /** @var Model $applicationModel */
        $applicationModel = $factory::create($applicationType);

        return $this instanceof $applicationModel
            ? parent::newInstance($attributes, $exists)
            : $applicationModel->newInstance($attributes, $exists);
    }
}
