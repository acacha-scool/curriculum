<?php

namespace Scool\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasManyStudies;

/**
 * Class Law.
 *
 * @package Scool\Curriculum\Models
 */
class Law extends Model
{
    use HasManyStudies;

    /**
     * LOE code.
     */
    const LOE = "LOE";
    /**
     * LOGSE code.
     */
    const LOGSE = "LOGSE";

    /**
     * LOE name.
     */
    const LOE_NAME = "Ley Orgánica de Educación";
    /**
     * LOGSE name.
     */
    const LOGSE_NAME = "Ley Orgánica general del Sistema Educativo";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name'];
}
