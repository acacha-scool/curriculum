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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'shortname', 'name', 'description'] ;

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
        return $this->belongsToMany(Submodule::class);
    }

    /**
     * The family related to this speciality.
     */
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

}
