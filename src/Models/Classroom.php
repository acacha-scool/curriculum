<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasSubmodules;

/**
 * Class Classroom.
 *
 * @package Scool\Curriculum\Models
 */
class Classroom extends Model
{
    use HasSubmodules, HasCourses;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name','location_id'];
}
