<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Family;

/**
 * Class HasFamilies.
 *
 * @package Scool\Curriculum\Traits
 */
trait HasFamilies
{
    /**
     * Get the families associated with the model.
     */
    public function families()
    {
        return $this->hasMany(Family::class);
    }
}

