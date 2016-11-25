<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasFamilies;

/**
 * Class Department.
 *
 * @package Scool\Curriculum\Models
 */
class Department extends Model
{
    use HasFamilies, Nameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the subdepartments for the department.
     */
    public function subdepartments()
    {
        return $this->hasMany(Department::class,'parent');
    }

    /**
     * Get the parent department.
     */
    public function parent()
    {
        return $this->belongsTo(Department::class,'parent');
    }
}
