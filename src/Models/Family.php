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
        return $this->belongsToMany(Speciality::class);
    }

}
