<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Speciality;

trait HasSpecialities
{
    /**
     * The especialities that belongs to the model.
     */
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }
}