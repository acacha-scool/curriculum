<?php

use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Speciality;

if (! function_exists('speciality_first_or_create')) {
    /**
     * Create speciality if not exists and return new o already existing speciality.
     */
    function speciality_first_or_create($code, $name, $description)
    {
        try {
            $speciality = Speciality::create([
                'code' => $code,
                'name' => $name,
                'description' => $description,
            ]);
            return $speciality;
        } catch (Illuminate\Database\QueryException $e) {
            return Speciality::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('seed_specialities')) {

    /**
     * Seed specialities
     *
     * @return mixed
     */
    function seed_specialities()
    {
        speciality_first_or_create('CAS' , 'Curs Accés Grau Superior', '');
        speciality_first_or_create('505' , 'For. Org. Lab.', '');
        speciality_first_or_create('AN' , 'Anglès', '');
        speciality_first_or_create('MA' , 'Matemàtiques', '');
        speciality_first_or_create('507' , 'Informàtica', '');
    }
}

if (! function_exists('classroom_first_or_create()')) {

    /**
     * Create classrom or returns the already exiting one.
     *
     * @return mixed
     */
    function classroom_first_or_create($code, $name, $location , $shift) {
        try {
            $classroom = Classroom::create([
                'code' => $code,
                'name' => $name,
                'location_id' => $location,
                'shift_id' => $shift,
            ]);
            return $classroom;
        } catch (Illuminate\Database\QueryException $e) {
            return Classroom::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('obtainLocationIdByName()')) {

    /**
     * Seed obtain location id by name.
     *
     * @return mixed
     */
    function obtainLocationIdByName($name) {
        //TODO
        return 1;
    }
}

if (! function_exists('obtainShiftIdByCode()')) {

    /**
     * Seed obtain shift id by code.
     *
     * @return mixed
     */
    function obtainShiftIdByCode($code) {
        //TODO
        return 1;
    }
}

if (! function_exists('seed_classrooms()')) {

    /**
     * Seed classrooms.
     *
     * @return mixed
     */
    function seed_classrooms()
    {
        classroom_first_or_create('1GAD' , '1r Gestió Administrativa'    , obtainLocationIdByName('32') , obtainShiftIdByCode('M'));
        classroom_first_or_create('2GAD' , '2n Gestió Administrativa'    , obtainLocationIdByName('32') , obtainShiftIdByCode('T'));
        classroom_first_or_create('2AF'  , '2n Administració i finànces' , obtainLocationIdByName('31') , obtainShiftIdByCode('T'));
        classroom_first_or_create('1ADI' , 'Assistència a la direcció'   , obtainLocationIdByName('30') , obtainShiftIdByCode('M'));
    }
}

if (! function_exists('seed_submodules()')) {

    /**
     * Seed submodules.
     *
     * @return mixed
     */
    function seed_submodules()
    {
        classroom_first_or_create('1GAD' , '1r Gestió Administrativa'    , obtainLocationIdByName('32') , obtainShiftIdByCode('M'));
        classroom_first_or_create('2GAD' , '2n Gestió Administrativa'    , obtainLocationIdByName('32') , obtainShiftIdByCode('T'));
        classroom_first_or_create('2AF'  , '2n Administració i finànces' , obtainLocationIdByName('31') , obtainShiftIdByCode('T'));
        classroom_first_or_create('1ADI' , 'Assistència a la direcció'   , obtainLocationIdByName('30') , obtainShiftIdByCode('M'));
    }
}

if (! function_exists('seed_modules()')) {

    /**
     * Seed submodules.
     *
     * @return mixed
     */
    function seed_modules()
    {
        classroom_first_or_create('1GAD' , '1r Gestió Administrativa'    , obtainLocationIdByName('32') , obtainShiftIdByCode('M'));
    }
}
