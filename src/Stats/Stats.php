<?php

namespace Scool\Curriculum\Stats;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Str;
use Scool\Curriculum\Stats\Contracts\StatsRepository;

/**
 * Class Stats.
 *
 * @package Scool\Curriculum\Stats
 */
class Stats
{
    /**
     * The model from which obtain stats.
     *
     * @var
     */
    protected static $model;

    /**
     * Laravel app.
     *
     * @var Application
     */
    protected $app;

    /**
     * The stats repository.
     *
     * @var StatsRepository
     */
    protected static $repository;

    /**
     * An array of valid stats.
     *
     * @var
     */
    protected static $stats = ['total'];

    /**
     * An array of model relations.
     *
     * @var
     */
    protected static $relations = [];

    /**
     * Stats constructor.
     *
     * @param $modelClass
     * @param Application $app
     * @param StatsRepository $repository
     *
     */
    public function __construct($modelClass,Application $app,StatsRepository $repository)
    {
        $this->app = $app;
        self::$repository = $repository;
        $model = $this->app->make($modelClass);
        if (!$model instanceof Model) {
            throw new \RuntimeException("Class {$modelClass} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        self::$model = $model;
        $this->initializeStats();
    }

    /**
     * Get model.
     *
     * @return mixed
     */
    public static function model()
    {
        return self::$model;
    }

    /**
     * TODO
     */
    protected function initializeStats()
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
     * @param $modelClass
     * @return static
     */
    public static function of($modelClass)
    {
        $repo = resolve(StatsRepository::class);
        $repo->setModel(app()->make($modelClass));
        return new static($modelClass,app(), $repo);
    }

    /**
     * Get value for a specific stat.
     *
     * @param $stat
     * @return mixed|void
     * @throws \Exception
     */
    protected static function getStatValue($stat)
    {
        if( method_exists(Stats::class, $method = 'calculate'.Str::studly($stat))) {
            return call_user_func([Stats::class, $method]);
        }

        throw new \Exception;
    }

    /**
     * Calculate total number of registries for this model
     */
    protected static function calculateTotal()
    {
        $repo = self::$repository;
        return $repo->total();
    }



    /**
     * Handle dynamic static method calls for stats object.
     *
     * @param $name
     * @param $arguments
     * @return mixed|null|void
     */
    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::$stats)) {
            return self::getStatValue($name);
        }
//        dd($name);
//        dd(self::getRelationStats());
        if (in_array($name,self::getRelationStats())) {
            return self::getRelationStatValue($name);
        }
        dd("shit");

        return null;
    }

    /**
     * Get relation stats method names.
     *
     * @return array
     */
    protected static function getRelationStats()
    {
        return (collect(static::$relations)->map(function ($name) {
            return 'total' . Str::studly($name);
        }))->toArray();
    }

    /**
     * TODO
     * @return string
     */
    protected static function getRelationStatValue($name) {
        //TODO
        return 50;
    }

    /**
     * Refresh/flush keys in cache.
     */
    protected static function refresh() {
        if (is_a(self::$repository,CacheableStatsRepository::class)) {
            $repo = self::$repository;
            $repo->refresh();
        }
    }

}