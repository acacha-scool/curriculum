<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasManyStudies;

class Cycle extends Model
{
    use HasManyStudies;
}
