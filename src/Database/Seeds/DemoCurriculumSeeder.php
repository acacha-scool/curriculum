<?php

namespace Scool\Curriculum\Database\Seeds;

use Illuminate\Database\Seeder;

/**
 * Class DemoCurriculumSeeder.
 *
 * @package Scool\Curriculum\Database\Seeds
 */
class DemoCurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DemoDepInformaticaSeeder::class);
    }

}
