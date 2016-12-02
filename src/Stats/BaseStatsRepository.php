<?php

namespace Scool\Curriculum\Stats;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Stats\Contracts\StatsRepository;

/**
 * Class BaseStatsRepository.
 *
 * @package Scool\Curriculum\Stats
 */
abstract class BaseStatsRepository implements StatsRepository
{

    /**
     * The model from which obtain stats.
     *
     * @var Model
     */
    protected $model;

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * BaseStatsRepository constructor.
     *
     */
    public function __construct()
    {

    }

    /**
     * Count total number of elements in model.
     *
     * @return mixed
     */
    public abstract function total();
}