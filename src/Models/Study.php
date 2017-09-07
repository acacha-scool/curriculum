<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasDepartments;
use Scool\Curriculum\Traits\HasLaw;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Study.
 *
 * @package Scool\Curriculum\Models
 */
class Study extends Model implements Transformable
{
    use HasLaw,HasDepartments,HasCourses,TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','law_id'];
}
