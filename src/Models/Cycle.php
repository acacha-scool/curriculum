<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasManyStudies;

/**
 * Class Cycle.
 *
 * @package Scool\Curriculum\Models
 */
class Cycle extends Model
{
    use HasManyStudies;
}
