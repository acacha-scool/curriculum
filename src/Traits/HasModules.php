<?php

namespace Scool\Curriculum\Traits;

use Scool\Curriculum\Models\Module;

/**
 * Class HasModules
 * @package Scool\Curriculum\Traits
 */
trait HasModules
{
    /**
     * The study modules that belongs to the model.
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class)->withTimestamps();
    }

    /**
     * Add a module to modules.
     *
     * @param Module $module
     */
    public function addModule($module){
        $this->modules()->save($module);
    }

    /**
     * Add a module by id to modules.
     *
     * @param Module $module
     */
    public function addModuleById($module){
        $this->modules()->save(Module::findOrFail($module));
    }

}