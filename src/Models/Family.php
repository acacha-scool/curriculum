<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasManyStudies;

/**
 * Class Family.
 *
 * @package Scool\Curriculum\Models
 */
class Family extends Model
{
    use HasManyStudies;

    protected $fillable = ['code','shortname', 'name'];

    /**
     * The specialities that belong to family.
     */
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }

}
