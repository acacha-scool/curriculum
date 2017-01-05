<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
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
    use HasSubmodules, HasCourses, Nameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
