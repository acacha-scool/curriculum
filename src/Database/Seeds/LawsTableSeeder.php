<?php

namespace Scool\Curriculum\Database\Seeds;

use Illuminate\Database\Seeder;
use Scool\Curriculum\Models\Law;

/**
 * Class LawsTableSeeder.
 */
class LawsTableSeeder extends Seeder
{
    /**
     * Run the laws table seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createLaw(Law::LOE,Law::LOE_NAME);
        $this->createLaw(Law::LOGSE,Law::LOGSE_NAME);
    }

    /**
     * Create a law type by shortname and name.
     *
     * @param $shortname
     * @param $name
     */
    private function createLaw($shortname,$name)
    {
        $law = Law::firstOrCreate([
            'name' => $name
        ]);
        $law->shortname = $shortname;
    }
}