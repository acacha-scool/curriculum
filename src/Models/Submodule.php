<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasModules;
use Scool\Curriculum\Traits\HasSpecialities;
use Scool\Curriculum\Traits\HasClassrooms;

/**
 * Class Submodule.
 *
 * @package Scool\Curriculum\Models
 */
class Submodule extends Model
{
    use HasSpecialities, HasModules, HasClassrooms;
}
