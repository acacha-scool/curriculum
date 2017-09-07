<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasStudy;
use Scool\Curriculum\Traits\HasSubmodules;

/**
 * Class Module.
 *
 * @package Scool\Curriculum\Models
 */
class Module extends Model
{
    use HasCourses,HasSubmodules, HasStudy;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'order','study_id'];

}
