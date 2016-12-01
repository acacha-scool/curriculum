<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasDepartments;
use Scool\Curriculum\Traits\HasLaw;

/**
 * Class Study.
 *
 * @package Scool\Curriculum\Models
 */
class Study extends Model
{
    use HasLaw,HasDepartments,HasCourses,Nameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
