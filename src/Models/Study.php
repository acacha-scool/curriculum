<?php

namespace Scool\Curriculum\Models;

use Acacha\Periods\Traits\HasPeriods;
use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Traits\HasLaw;

class Study extends Model
{
    use HasPeriods, HasLaw, HasCycle, HasFamilies;
}
