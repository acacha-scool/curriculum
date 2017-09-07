<?php

use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Family;
use Scool\Curriculum\Models\Law;
use Scool\Curriculum\Models\Speciality;
use Scool\Curriculum\Models\Study;

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
     *
     * @param $code
     * @param $name
     * @return $this|\Illuminate\Database\Eloquent\Model|static
     */
    function first_or_create_law($code, $name)
    {
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
     *
     * @param $code
     * @param $name
     * @param $law
     * @return $this|\Illuminate\Database\Eloquent\Model|static
     */
    function first_or_create_study($code, $name, $law)
    {
        try {
            $study = Study::create([
                'code' => $code,
                'name' => $name,
                'law_id' => $law,
                'state' => 'active'
            ]);
            return $study;
        } catch (Illuminate\Database\QueryException $e) {
            return Study::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('obtainLawIdByCode')) {
    /**
     * Obtain Law id by code.
     *
     * @param $code
     * @return mixed
     */
    function obtainLawIdByCode($code)
    {
        return Law::where('code', $code)->first()->id;
    }
}

if (! function_exists('seed_studies')) {
    /**
     * Seed studies.
     */
    function seed_studies()
    {
        //Depends: laws
        seed_laws();
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

if (! function_exists('first_or_create_speciality')) {

    /**
     * Create speciality if not exists and return new o already existing speciality.
     *
     * @param $code
     * @param $name
     * @param $description
     * @return $this|\Illuminate\Database\Eloquent\Model|static
     */
    function first_or_create_speciality($code, $name, $description)
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
        //Depends on nothing
        first_or_create_speciality('CAS' , 'Curs Accés Grau Superior', '');
        first_or_create_speciality('505' , 'For. Org. Lab.', '');
        first_or_create_speciality('AN' , 'Anglès', '');
        first_or_create_speciality('MA' , 'Matemàtiques', '');
        first_or_create_speciality('507' , 'Informàtica', '');
        first_or_create_speciality('627' , 'TODO Tècnic Informàtica', '');
        first_or_create_speciality('517' , 'TODO', '');
        first_or_create_speciality('518' , 'TODO1', '');
        first_or_create_speciality('619' , 'TODO2', '');
        first_or_create_speciality('620' , 'TODO3', '');
        first_or_create_speciality('508' , 'TODO4', '');
        first_or_create_speciality('625' , 'TODO5', '');
        //TODO
    }
}

if (! function_exists('first_or_create_family')) {

    /**
     * Create family if not exists and return new o already existing family.
     *
     * @param $code
     * @param $shortname
     * @param $name
     * @param $specialities
     * @return $this|\Illuminate\Database\Eloquent\Model|static
     */
    function first_or_create_family($code, $shortname, $name, $specialities)
    {
        try {
            $family = Family::create([
                'code' => $code,
                'shortname' => $shortname,
                'name' => $name,
            ]);

            $family->specialities()->sync($specialities);
            return $family;
        } catch (Illuminate\Database\QueryException $e) {
            return Family::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('obtainSpecialityIdByCode')) {

    /**
     * Obtain speciality id by code.
     *
     * @param $code
     * @return mixed
     */
    function obtainSpecialityIdByCode($code)
    {
        return Speciality::where('code', $code)->first()->id;
    }
}

if (! function_exists('seed_families')) {

    /**
     * Seed families
     *
     * @return mixed
     */
    function seed_families()
    {
        //Depends on specialities
        seed_specialities();
        first_or_create_family('SAN','Sanitat' , "Família de sanitat", [
            obtainSpecialityIdByCode('517'),
            obtainSpecialityIdByCode('518'),
            obtainSpecialityIdByCode('619'),
            obtainSpecialityIdByCode('620')
        ]);
        first_or_create_family('INF','Informàtica' , "Família d'informàtica", [
            obtainSpecialityIdByCode('507'),
            obtainSpecialityIdByCode('627')
        ]);
        first_or_create_family('SSCC','Serveis socioculturals' , "Família de serveis socioculturals i a la comunitat", [
            obtainSpecialityIdByCode('508'),
            obtainSpecialityIdByCode('625')
        ]);
        //TODO
    }
}

if (! function_exists('obtainFamilyIdByCode')) {

    /**
     * Obtain family id by code.
     *
     * @param $code
     * @return mixed
     */
    function obtainFamilyIdByCode($code)
    {
        return Family::where('code', $code)->first()->id;
    }
}

if (! function_exists('first_or_create_department')) {

    /**
     * Create department if not exists and return new o already existing department.
     *
     * @return mixed
     */
    function first_or_create_department($code, $shortname, $name, $families)
    {
        try {
            $department = Department::create([
                'code' => $code,
                'shortname' => $shortname,
                'name' => $name
            ]);

            $department->families(sync($families));

            return $department;
        } catch (Illuminate\Database\QueryException $e) {
            return Department::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('seed_departments')) {

    /**
     * Seed departments.
     *
     * @return mixed
     */
    function seed_departments()
    {
        seed_families();
        //Depends on: caps de departament i/o caps de seminari | location | families | studies relacionats
        first_or_create_department("ADM","Administració","Departament d'administració i gestió",
            [obtainFamilyIdByCode('ADM')]);
        first_or_create_department("INF","Informàtica","Departament d'informàtica",
            [obtainFamilyIdByCode('INF')]);
        first_or_create_department("FOL","Orientació laboral","Departament de formació i orientació laboral" ,
            [obtainFamilyIdByCode('FOL')]);
        first_or_create_department("ELE","Electricitat","Departament d'electricitat i electrònica",
            [obtainFamilyIdByCode('ELE')]);
        first_or_create_department("COM","Comerç","Departament de comerç i màrqueting",
            [obtainFamilyIdByCode('COM')]);
        first_or_create_department("EDF","Edificació","Departament d'edificació i obra civil",
            [obtainFamilyIdByCode('EDF')]);
        first_or_create_department("MEC", "Mecànica" ,"Departament de fabricació mecànica" ,
            [obtainFamilyIdByCode('FOL')]);
        first_or_create_department("SAN","Sanitat","Departament de sanitat",
            [obtainFamilyIdByCode('FOL')]);
        first_or_create_department("SSC","Serveis", "Departament de serveis socioculturals i a la comunitat",
            [obtainFamilyIdByCode('FOL')]);
        first_or_create_department("CAS","Curs accés","Preparació proves d'accès a superior",
            [obtainFamilyIdByCode('FOL')]);
        first_or_create_department("ART","Arts gràfiques","Departament d'Arts gràfiques",
            [obtainFamilyIdByCode('FOL')]);
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
     * Obtain location id by name.
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

if (! function_exists('seed_curriculum()')) {

    /**
     * Seed all curriculum.
     *
     * @return mixed
     */
    function seed_curriculum()
    {
        seed_laws();
        seed_studies();
        seed_specialities();
        seed_families();
    }
}
