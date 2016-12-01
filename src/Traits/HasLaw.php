<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Law;

/**
 * Class HasLaw.
 *
 * @package Scool\Curriculum\Traits
 */
trait HasLaw
{
    /**
     * Get the law associated with the model.
     */
    public function law()
    {
        return $this->hasOne(Law::class)->withTimestamps();
    }
}

