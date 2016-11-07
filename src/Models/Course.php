<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasSubmodules;

/**
 * Class Course.
 *
 * @package Scool\Curriculum\Models
 */
class Course extends Model
{
    use HasSubmodules;
}
