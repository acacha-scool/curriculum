<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasModules;
use Scool\Curriculum\Traits\HasSpecialities;
use Scool\Curriculum\Traits\HasClassrooms;
use Acacha\Periods\Traits\HasPeriods;
use Scool\Curriculum\Traits\HasStudies;

/**
 * Class Submodule.
 *
 * @package Scool\Curriculum\Models
 */
class Submodule extends Model
{
    use HasSpecialities, HasModules, HasClassrooms, HasPeriods, HasCourses, HasStudies;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'total_hours', 'week_hours', 'start_date', 'finish_date'];
}
