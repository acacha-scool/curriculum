<?php

namespace Scool\Curriculum\Database\Seeds;

use Illuminate\Database\Seeder;

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
        $this->seedStudySubModules();
        $this->seedStudyCycles();
        $this->seedStudyLaws();
    }

    private function seedStudies()
    {
//        factory();
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

    private function seedStudySubModules()
    {

    }

    private function seedStudyCycles()
    {
    }

    private function seedStudyLaws()
    {

    }
}
