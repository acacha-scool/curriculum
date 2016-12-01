<?php

namespace Scool\Curriculum\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasManyStudies;

/**
 * Class Law.
 *
 * @package Scool\Curriculum\Models
 */
class Law extends Model
{
    use HasManyStudies,Nameable;

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
}
