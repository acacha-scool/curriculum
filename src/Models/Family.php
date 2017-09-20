<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Family.
 *
 * @package Scool\Curriculum\Models
 */
class Family extends Model
{
    protected $fillable = ['code','shortname', 'name'];

    /**
     * The specialities that belong to family.
     */
    public function specialities()
    {
        return $this->hasMany(Speciality::class);
    }

    /**
     * The department related to that family.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
