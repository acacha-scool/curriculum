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
    }

    private function seedStudies()
    {
        factory();
    }

    private function seedCourses()
    {

    }
}
