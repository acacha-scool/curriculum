<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasCourses;
use Scool\Curriculum\Traits\HasModules;
use Scool\Curriculum\Traits\HasSpecialities;
use Scool\Curriculum\Traits\HasClassrooms;
use Scool\Curriculum\Traits\HasStudies;

/**
 * Class Submodule.
 *
 * @package Scool\Curriculum\Models
 */
class Submodule extends Model
{
    use HasSpecialities, HasModules, HasClassrooms, HasCourses, HasStudies,Nameable;

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

    /**
     * Set the type.
     *
     * @param  string  $value
     * @return void
     */
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = SubmoduleType::where(['name' => $value])->first()->id;
    }
}
