<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasSubmodules;

/**
 * Class Module.
 *
 * @package Scool\Curriculum\Models
 */
class Module extends Model
{
    use HasSubmodules;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','shortname','name','description','state', 'order','type'];

}
