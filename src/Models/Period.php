<?php

namespace Scool\Curriculum\Models;

use Acacha\Periods\Period as BasePeriod;

class Period extends BasePeriod
{
    /**
     * Get all the study submodules for a period of time.
     */
    public function submodules()
    {
        return $this->morphedByMany(Submodule::class, 'periodable');
    }

    /**
     * Get all the study modules for a period of time.
     */
    public function modules()
    {
        return $this->morphedByMany(Module::class, 'periodable');
    }

    /**
     * Get all the courses for a period of time.
     */
    public function courses()
    {
        return $this->morphedByMany(Course::class, 'periodable');
    }

    /**
     * Get all the classrooms for a period of time.
     */
    public function classrooms()
    {
        return $this->morphedByMany(Classroom::class, 'periodable');
    }

    /**
     * Get all the studies for a period of time.
     */
    public function studies()
    {
        return $this->morphedByMany(Study::class, 'periodable');
    }

    /**
     * Get all the specialities for a period of time.
     */
    public function specialites()
    {
        return $this->morphedByMany(Speciality::class, 'periodable');
    }
}