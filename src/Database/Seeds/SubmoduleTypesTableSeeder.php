<?php

namespace Scool\Curriculum\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Curriculum\Models\SubmoduleType;

/**
 * Class SubmoduleTypesTableSeeder.
 */
class SubmoduleTypesTableSeeder extends Seeder
{
    /**
     * Run the submodule_types table seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createTypeByName(SubmoduleType::REGULAR_TYPE);
        // Formació en centre de treball
        $this->createTypeByName(SubmoduleType::FCT_TYPE);
        // Crèdit de sintesi o projecte
        $this->createTypeByName(SubmoduleType::PROJECT_TYPE);
        //Formació i orientació laboral
        $this->createTypeByName(SubmoduleType::FOL_TYPE);
        //Anglès
        $this->createTypeByName(SubmoduleType::FOL_TYPE);
    }

    /**
     * Create a submodule type by name.
     *
     * @param $name
     */
    private function createTypeByName($name)
    {
        $type = new SubmoduleType();
        $type->name = $name;
        $type->save();
    }
}