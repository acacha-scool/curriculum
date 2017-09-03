<?php

use Scool\Curriculum\Models\Speciality;

if (! function_exists('seed_specialities')) {

    /**
     * Seed specialities
     *
     * @return mixed
     */
    function seed_specialities()
    {
        Speciality::create(['code' => 'CAS' , name => 'Curs Accés Grau Superior', description => '']);
        Speciality::create(['code' => '505' , name => 'Curs Accés Grau Superior', description => '']);
        Speciality::create(['code' => 'AN' , name => 'Curs Accés Grau Superior', description => '']);
        Speciality::create(['code' => 'MA' , name => 'Curs Accés Grau Superior', description => '']);
        Speciality::create(['code' => '507' , name => 'Informàtica', description => '']);
    }
}

