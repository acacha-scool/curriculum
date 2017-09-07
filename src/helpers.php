<?php

use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Law;
use Scool\Curriculum\Models\Speciality;

if (! function_exists('seed_laws')) {
    /**
     * Seed laws.
     */
    function seed_laws()
    {
        first_or_create_law('LOGSE','Ley Orgánica de Ordenación General del Sistema Educativo');
        first_or_create_law('LOE','Ley Orgánica de Educación');
    }
}

if (! function_exists('first_or_create_law')) {
    /**
     * Create study if not exists and return new o already existing study.
     */
    function first_or_create_law($code, $name)
    {
        //Depends: on nothing
        try {
            $law = Law::create([
                'code' => $code,
                'name' => $name,
            ]);
            return $law;
        } catch (Illuminate\Database\QueryException $e) {
            return Law::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('first_or_create_study')) {
    /**
     * Create study if not exists and return new o already existing study.
     */
    function first_or_create_study($code, $name, $law)
    {
        //Depends: on nothing
        first_or_create_law("ACO","Activitats comercials",obtainLawIdByCode("LOE"));

    }
}

if (! function_exists('obtainLawIdByCode')) {
    /**
     * Obtain Law id by code
     */
    function obtainLawIdByCode($code)
    {

    }
}

if (! function_exists('seed_studies')) {
    /**
     * Seed studies.
     */
    function seed_studies()
    {
        //Depends: laws
        first_or_create_study("ACO","Activitats comercials",obtainLawIdByCode("LOE"));
        first_or_create_study("ADI","Assistència a la direcció",obtainLawIdByCode("LOE"));
        first_or_create_study("AF","Administració i finances",obtainLawIdByCode("LOE"));
        first_or_create_study("APD","Atenció a persones en situació de dependència",obtainLawIdByCode("LOE"));
        first_or_create_study("ARI","Automatització i robòtica industrial ",obtainLawIdByCode("LOE"));
        first_or_create_study("AS","Atenció sociosanitària",obtainLawIdByCode("LOGSE"));
        first_or_create_study("ASIX","Administració de Sistemes Informàtics ",obtainLawIdByCode("LOE"));
        first_or_create_study("ASIX - DAM","Administració de Sistemes Informàtics | Desenvolupament d'Aplicacions Multiplataforma",obtainLawIdByCode("LOE"));
        first_or_create_study("CAI","Cures auxiliars d'infermeria",obtainLawIdByCode("LOGSE"));
        first_or_create_study("CAM","Curs d'accès mitja",obtainLawIdByCode("LOE"));
        first_or_create_study("CAS","Curs d'accès superior",obtainLawIdByCode("LOE"));
        first_or_create_study("COM","Comerç",obtainLawIdByCode("LOGSE"));
        first_or_create_study("DAM","Desenvolupament d'aplicacions multiplataforma",obtainLawIdByCode("LOE"));
        first_or_create_study("DEPIM","Disseny i Edició de Publicacions Impreses i Multimèdia",obtainLawIdByCode("LOE"));
        first_or_create_study("DIE","Dietètica",obtainLawIdByCode("LOGSE"));
        first_or_create_study("EE","Eficiència energètica i energia solar tèrmica",obtainLawIdByCode("LOE"));
        first_or_create_study("EIN","Educació infantil",obtainLawIdByCode("LOE"));
        first_or_create_study("ES","Emergències sanitàries",obtainLawIdByCode("LOE"));
        first_or_create_study("FAR","Farmàcia i parafarmàcia",obtainLawIdByCode("LOE"));
        first_or_create_study("GAD","Gestió administrativa",obtainLawIdByCode("LOE"));
        first_or_create_study("GCM","Gestió comercial y màrqueting",obtainLawIdByCode("LOGSE"));
        first_or_create_study("IEA","Instal·lacions elèctriques i automàtiques",obtainLawIdByCode("LOE"));
        first_or_create_study("IME","Manteniment electromecànic",obtainLawIdByCode("LOE"));
        first_or_create_study("INS","Integració social",obtainLawIdByCode("LOE"));
        first_or_create_study("IT","Instal·lacions de telecomunicacions",obtainLawIdByCode("LOE"));
        first_or_create_study("LCB","Laboratori Clínic Biomèdic",obtainLawIdByCode("LOE"));
        first_or_create_study("LDC","Laboratori de diagnòstic clínic",obtainLawIdByCode("LOGSE"));
        first_or_create_study("MAP","Màrqueting i publicitat",obtainLawIdByCode("LOE"));
        first_or_create_study("MEC","Mecanització",obtainLawIdByCode("LOE"));
        first_or_create_study("PM","Programació de la producció en fabricació mecànica",obtainLawIdByCode("LOE"));
        first_or_create_study("PRID","Preimpresió digital",obtainLawIdByCode("LOE"));
        first_or_create_study("PRID_ANTIC","Preimpresió digital àntic",obtainLawIdByCode("LOE"));
        first_or_create_study("PRO","Projectes d'edificació",obtainLawIdByCode("LOE"));
        first_or_create_study("PRP","Prevenció de riscos professionals",obtainLawIdByCode("LOGSE"));
        first_or_create_study("SE","Secretariat",obtainLawIdByCode("LOGSE"));
        first_or_create_study("SEA","Sistemes electrònics i automatitzats",obtainLawIdByCode("LOE"));
        first_or_create_study("SIC","Soldadura i calderia",obtainLawIdByCode("LOE"));
        first_or_create_study("SMX","Sistemes microinformatics i xarxes",obtainLawIdByCode("LOE"));
        first_or_create_study("STI","Sistemes de telecomunicacions i informàtics",obtainLawIdByCode("LOE"));
    }
}



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
