<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Module;

trait HasModules
{
    /**
     * The study modules that belongs to the model.
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
}