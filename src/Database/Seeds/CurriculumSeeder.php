<?php

namespace Scool\Curriculum\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Speciality;
use Scool\Curriculum\Models\Submodule;
use Scool\Curriculum\Models\Module;
use Acacha\Periods\Period;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedStudies();
        $this->seedCourses();
        $this->seedSpecialities();
        $this->seedClassrooms();
        $this->seedStudyModules();
        $this->seedStudySubmodules();
        $this->seedStudyCycles();
        $this->seedStudyLaws();
    }

    private function seedStudies()
    {
    }

    private function seedCourses()
    {

    }

    private function seedSpecialities()
    {
    }

    private function seedClassrooms()
    {

    }

    private function seedStudyModules()
    {
    }

    private function seedStudySubmodules()
    {
        factory(Submodule::class, 50)->create()->each(function($submodule) {
            $submodule->specialities()->save(
                factory(Speciality::class)->create()
            );
            $submodule->modules()->save(
                factory(Module::class)->create()
            );
            $submodule->classrooms()->save(
                factory(Classroom::class)->create()
            );
            $submodule->periods()->save(
                factory(Period::class)->create(
                    [ "periodable_id" => $submodule->id,
                      "periodable_type" => get_class($submodule)
                    ]
                )
            );
        });
    }

    private function seedStudyCycles()
    {
    }

    private function seedStudyLaws()
    {

    }
}
