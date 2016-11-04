<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Speciality.
 *
 * @package Scool\Curriculum\Models
 */
class Speciality extends Model
{
    /**
     * The teachers that belongs to the speciality.
     */
    public function teachers()
    {
        return $this->belongsToMany(config('curriculum.user_class'));
    }

    /**
     * The study submodules that belongs to the speciality.
     */
    public function study_submodules()
    {
        return $this->belongsToMany(StudySubModule::class);
    }
}
