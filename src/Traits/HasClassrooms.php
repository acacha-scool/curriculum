<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Classroom;

/**
 * Class HasClassrooms.
 *
 * @package Scool\Curriculum\Traits
 */
trait HasClassrooms
{
    /**
     * The classrooms that belongs to the model.
     */
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }
}