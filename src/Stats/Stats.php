<?php

namespace Scool\Curriculum\Stats;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stats.
 *
 * @package Scool\Curriculum\Stats
 */
class Stats
{
    /**
     * @var
     */
    protected $model;

    /**
     * @var
     */
    protected $stats = ['total'];

    /**
     * Stats constructor.
     *
     * @param $modelClass
     */
    public function __construct($modelClass)
    {
        $model = $this->app->make($modelClass);
        if (!$model instanceof Model) {
            throw new \RuntimeException("Class {$modelClass} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        $this->model = $model;
        $this->initializeStats();
        $this->initialize();
    }

    protected function initializeStats()
    {
        foreach ($this->relations() as $relation) {

        }
    }

    protected function initialize()
    {

    }

    /**
     * Get model relations as array.
     *
     * @return array
     */
    protected function relations() {
        return $this->model->relationsToArray();
    }

    /**
     * Create stats for a model
     *
     * @param $model
     * @return static
     */
    public static function of($modelClass)
    {
        return new static($modelClass);
    }

    /**
     * Dynamically retrieve attributes for stats object.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        if (array_key_exists($key, $this->stats)) {
            return $this->getStatValue($key);
        }

        if (method_exists(self::class, $key)) {
            return;
        }
    }

    /**
     * Get value for a specific stat.
     *
     * @param $key
     * @return mixed|void
     */
    protected function getStatValue($key)
    {
        return $this->statIsCached($key) ? $this->getCachedStatValue($key) : $this->getCalculatedStatValue($key);
    }

    protected function getCachedStatValue($key)
    {

    }
    /**
     * Get calculated state value.
     */
    protected function getCalculatedStatValue($key)
    {
        $method = 'calculate'.Str::studly($key);

        if(! method_exists($this, 'get'.$method)) {
            return;
        }
        return $this->{$method};
    }

    /**
     * Calculate total number of registries for this model
     */
    public function calculateTotal()
    {
        return $this->model->all()->count();
        //TODO: try $this->model->count() direct no select, no collection -> faster?;
    }


    /**
     * Refresh cached stats
     */
    public function refresh()
    {
        //TODO
    }

    /**
     * Handle dynamic method calls for stats object.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {

    }




}