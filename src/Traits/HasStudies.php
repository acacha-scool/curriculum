<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Study;

/**
 * Class HasStudies.
 *
 * @package Scool\Curriculum\Traits
 */
trait HasStudies
{
    /**
     * Get the studies associated with the model.
     */
    public function studies()
    {
        return $this->hasMany(Study::class);
    }
}

