<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasStudies;

/**
 * Class Course.
 *
 * @package Scool\Curriculum\Models
 */
class Course extends Model
{
    use HasStudies;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name','state','cycle_id','order'];

}
