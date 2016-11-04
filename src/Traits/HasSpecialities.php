<?php

namespace Scool\Curriculum\Traits;

trait HasSpecialities
{
    /**
     * The especialities that belongs to the teacher/user.
     */
    public function specialities()
    {
        return $this->belongsToMany(\Scool\Curriculum\Models\Speciality::class);
    }
}