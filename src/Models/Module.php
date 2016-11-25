<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasStudy;
use Scool\Curriculum\Traits\HasSubmodules;

/**
 * Class Module.
 *
 * @package Scool\Curriculum\Models
 */
class Module extends Model
{
    use HasSubmodules, HasStudy, Nameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'order','study_id'];

}
