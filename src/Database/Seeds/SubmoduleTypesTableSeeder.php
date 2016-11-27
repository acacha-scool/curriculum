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
        $this->createTypeByName(SubmoduleType::FCT_TYPE);
        $this->createTypeByName(SubmoduleType::PROJECT_TYPE);
        $this->createTypeByName(SubmoduleType::FOL_TYPE);
        $this->createTypeByName(SubmoduleType::ANGLES_TYPE);
    }

    /**
     * Create a submodule type by name.
     *
     * @param $name
     */
    private function createTypeByName($name)
    {
        SubmoduleType::firstOrCreate([
            'name' => $name
        ]);
    }
}