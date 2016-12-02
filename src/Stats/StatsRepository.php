<?php

namespace Scool\Curriculum\Stats;

/**
 * Class StatsRepository.
 *
 * @package Scool\Curriculum\Stats
 */
class StatsRepository extends BaseStatsRepository  {

    /**
     * Count total number of elements in model.
     *
     * @return mixed
     */
    public function total()
    {
        return $this->model->count();
    }

}