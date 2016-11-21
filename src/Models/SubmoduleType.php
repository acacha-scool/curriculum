<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SubmoduleType.
 *
 * @package Scool\Curriculum\Models
 */
class SubmoduleType extends Model
{
    /**
     * Name value for type regular.
     */
    const REGULAR_TYPE = "Regular";
    /**
     * Name value for type FCT.
     */
    const FCT_TYPE = "FCT";
    /**
     * Name value for type síntesi/projecte.
     */
    const PROJECT_TYPE = "Síntesi/Projecte";
    /**
     * Name value for type FOL.
     */
    const FOL_TYPE = "FOL";
    /**
     * Name value for type anglès.
     */
    const ANGLES_TYPE = "Anglès";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the study submodules for this type.
     */
    public function submodules()
    {
        return $this->hasMany(Submodule::class);
    }
}
