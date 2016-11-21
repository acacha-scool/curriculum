<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Department;

/**
 * Class HasDepartments.
 *
 * @package Scool\Curriculum\Traits
 */
trait HasDepartments
{
    /**
     * Get the departments associated with the model.
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}

