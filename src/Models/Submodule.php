<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Submodule.
 *
 * @package Scool\Curriculum\Models
 */
class Submodule extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'shortname', 'name', 'description', 'state', 'module_id', 'order' , 'total_hours', 'week_hours', 'start_date', 'finish_date'];

    /**
     * Get the type os study submodule.
     */
    public function type()
    {
        return $this->belongsTo(SubmoduleType::class);
    }

    /**
     * Get the study submodule classrooms.
     */
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
