<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasStudies;

/**
 * Class Family.
 *
 * @package Scool\Curriculum\Models
 */
class Family extends Model
{
    use HasStudies, HasDepartments;
}
