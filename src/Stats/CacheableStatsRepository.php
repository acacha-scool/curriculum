<?php

namespace Scool\Curriculum\Stats;

use Cache;

/**
 * Class CacheableStatsRepository.
 *
 * @package Scool\Curriculum\Stats
 */
class CacheableStatsRepository extends BaseStatsRepository
{
    /**
     * The repository to cache.
     *
     * @var StatsRepository
     */
    protected $repository;

    /**
     * CacheableStatsRepository constructor.
     *
     * @param StatsRepository $repository
     */
    public function __construct(StatsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Set model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function setModel($model)
    {
        $this->repository->setModel($model);
    }


    /**
     * Count total number of elements in model.
     *
     * @return mixed
     */
    public function total()
    {
        return Cache::rememberForever($this->prefix() . '.stats.total',function() {
            return $this->repository->total();
        });
    }

    /**
     *
     */
    protected function prefix()
    {
        return str_replace("\\" ,".", get_class($this->repository->getModel()));
    }
}