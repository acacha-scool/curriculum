<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Department extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
