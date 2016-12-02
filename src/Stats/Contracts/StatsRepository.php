<?php

namespace Scool\Curriculum\Stats\Contracts;

/**
 * Interface StatsRepository.
 *
 * @package Scool\Curriculum\Stats\Contracts
 */
interface StatsRepository
{
    /**
     * Count total number of elements in model.
     *
     * @return mixed
     */
    public function total();
}