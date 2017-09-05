<?php

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
