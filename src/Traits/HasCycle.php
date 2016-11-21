<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Cycle;

/**
 * Class HasCycle.
 *
 * @package Scool\Curriculum\Traits
 */
trait HasCycle
{
    /**
     * Get the law associated with the model.
     */
    public function cycle()
    {
        return $this->hasOne(Cycle::class);
    }
}

