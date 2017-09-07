<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasModules;
use Scool\Curriculum\Traits\HasSpecialities;
use Scool\Curriculum\Traits\HasClassrooms;
use Scool\Curriculum\Traits\HasManyStudies;

/**
 * Class Submodule.
 *
 * @package Scool\Curriculum\Models
 */
class Submodule extends Model
{
    use HasSpecialities, HasModules, HasClassrooms, HasCourses, HasManyStudies;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'order' , 'total_hours', 'week_hours', 'start_date', 'finish_date'];

    /**
     * Get the type os study submodule.
     */
    public function type()
    {
        return $this->belongsTo(SubmoduleType::class);
    }
}
