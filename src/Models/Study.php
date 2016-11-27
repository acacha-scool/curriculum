<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasLaw;

/**
 * Class Study.
 *
 * @package Scool\Curriculum\Models
 */
class Study extends Model
{
    use HasLaw;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
