<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department.
 *
 * @package Scool\Curriculum\Models
 */
class Department extends Model
{
    protected $fillable = ['code','shortname', 'name'];
}
