<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasSubmodules;
use Scool\Foundation\Location;
use Scool\Timetables\Models\Shift;

/**
 * Class Classroom.
 *
 * @package Scool\Curriculum\Models
 */
class Classroom extends Model
{
    use HasSubmodules;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','shortname','name','shift_id','location_id'];

    /**
     * Get the classroom shift.
     */
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    /**
     * Get the classroom location.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
