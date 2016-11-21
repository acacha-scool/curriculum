<?php

namespace Scool\Curriculum\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Speciality;
use Scool\Curriculum\Models\Submodule;
use Scool\Curriculum\Models\Module;
use Scool\Curriculum\Models\Course;
use Acacha\Periods\Period;

/**
 * Class CurriculumSeeder.
 *
 * @package Scool\Curriculum\Database\Seeds
 */
class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedStudySubmodules();
        $this->call(DemoDepInformaticaSeeder::class);
    }

    /**
     * Seed study submodules
     */
    private function seedStudySubmodules()
    {
        factory(Submodule::class, 50)->create()->each(function($submodule) {

            $submodule->periods()->save(
                factory(Period::class)->create(
                    [ "periodable_id" => $submodule->id,
                        "periodable_type" => get_class($submodule)
                    ]
                )
            );

            $submodule->specialities()->save(
                factory(Speciality::class)->create()
            );

            $submodule->modules()->save(
                factory(Module::class)->create()
            );

            $submodule->classrooms()->save(
                factory(Classroom::class)->create()
            );
            $submodule->courses()->save(
                factory(Course::class)->create()
            );
        });
    }

}
