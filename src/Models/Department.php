<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department.
 *
 * @package Scool\Curriculum\Models
 */
class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','shortname', 'name','location_id'];

    /**
     * The families that belongs to department.
     */
    public function families()
    {
        return $this->hasMany(Family::class);
    }

}
