<?php

use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Course;
use Scool\Curriculum\Models\Department;
use Scool\Curriculum\Models\Family;
use Scool\Curriculum\Models\Law;
use Scool\Curriculum\Models\Module;
use Scool\Curriculum\Models\Speciality;
use Scool\Curriculum\Models\Study;
use Scool\Curriculum\Models\Submodule;

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
        first_or_create_study("SEA","Sistemes electrònics i automatitzats",obtainLawIdByCode("LOE"));
        first_or_create_study("SIC","Soldadura i calderia",obtainLawIdByCode("LOE"));
        first_or_create_study("SMX","Sistemes microinformatics i xarxes",obtainLawIdByCode("LOE"));
        first_or_create_study("STI","Sistemes de telecomunicacions i informàtics",obtainLawIdByCode("LOE"));
    }
}

if (! function_exists('obtainStudyIdByCode')) {

    /**
     * Obtain study id by code.
     *
     * @param $code
     * @return mixed
     */
    function obtainStudyIdByCode($code)
    {
        return Study::where('code', $code)->first()->id;
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
        // TODO: name->shortname and add name as full name!
        first_or_create_speciality('CAS' , 'Curs Accés Grau Superior', '');
        first_or_create_speciality('AN' ,  'Anglès', '');
        first_or_create_speciality('MA' ,  'Matemàtiques', '');
        first_or_create_speciality('501' , 'Ad. Empreses', '');
        first_or_create_speciality('504' , 'C. civ. edif.', '');
        first_or_create_speciality('505' , 'For. Org. Lab.', '');
        first_or_create_speciality('507' , 'Informàtica', '');
        first_or_create_speciality('508' , 'Int. Sociocom.', '');
        first_or_create_speciality('510' , 'Org. Gest. Com.', '');
        first_or_create_speciality('512' , 'O. P. Fab. Mec.', '');
        first_or_create_speciality('513' , 'Org. Proj. Energ.', '');
        first_or_create_speciality('517' , 'P. Diag. Clínic', '');
        first_or_create_speciality('518' , 'Proce. Sanitaris', '');
        first_or_create_speciality('522' , 'P. Arts gràfiques', '');
        first_or_create_speciality('524' , 'Sist. Electro.', '');
        first_or_create_speciality('525' , 'S. Elect. Auto.', '');
        first_or_create_speciality('602' , 'Eq.Electrònic', '');
        first_or_create_speciality('605' , 'I. eq.t', '');
        first_or_create_speciality('606' , 'Ins. Electro.', '');
        first_or_create_speciality('611' , 'Mec. Màquines', '');
        first_or_create_speciality('612' , 'Of. Pr. Constr.', '');
        first_or_create_speciality('619' , 'Pro. Clíni. Ortop.', '');
        first_or_create_speciality('620' , 'P. Sanit. Assis.', '');
        first_or_create_speciality('621' , 'Proc. Comerc.', '');
        first_or_create_speciality('622' , 'P. Gest. Adm.', '');
        first_or_create_speciality('623' , 'Preimp. Digital', '');
        first_or_create_speciality('625' , 'Serv. Comunit.', '');
        first_or_create_speciality('627' , 'Sist. Apli. Infor.', '');
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
        first_or_create_family('SSC','Serveis socioculturals' , "Família de serveis socioculturals i a la comunitat", [
            obtainSpecialityIdByCode('508'),
            obtainSpecialityIdByCode('625')
        ]);
        first_or_create_family('ADM','Administració' , "Família d'administració i gestió", [
            obtainSpecialityIdByCode('501'),
            obtainSpecialityIdByCode('622')
        ]);
        first_or_create_family('COM','Comerç' , "Família de comerç i marqueting", [
            obtainSpecialityIdByCode('510'),
            obtainSpecialityIdByCode('621')
        ]);
        first_or_create_family('ART','Arts gràfiques' , "Família d'arts gràfiques", [
            obtainSpecialityIdByCode('522'),
            obtainSpecialityIdByCode('623')
        ]);
        //TODO subdivide ok
        first_or_create_family('ELE','Electricitat' , "Família d'electricitat i electrònica", [
            obtainSpecialityIdByCode('602'),
            obtainSpecialityIdByCode('605'),
            obtainSpecialityIdByCode('606')
        ]);
        //TODO subdivide ok
        first_or_create_family('ENE','Energia' , "Energia i aigua", [
            obtainSpecialityIdByCode('602'),
            obtainSpecialityIdByCode('605'),
            obtainSpecialityIdByCode('606')
        ]);

        //Todo: check if is ok!!1
        first_or_create_family('MEC','Mecànica' , "Familia de fabricació mecànica", [
            obtainSpecialityIdByCode('512'),
        ]);
        //Todo: check if is ok!!1
        first_or_create_family('MAN','Manteniment' , "Familia d'instal·lació i manteniment", [
            obtainSpecialityIdByCode('611'),
        ]);

        first_or_create_family('EDF','Edificació' , "Familia d'edificació i obra civil", [
            obtainSpecialityIdByCode('504'),
            obtainSpecialityIdByCode('612'),
        ]);

        first_or_create_family('FOL','FOL' , "Familia  d'orientació laboral", [
            obtainSpecialityIdByCode('504'),
            obtainSpecialityIdByCode('612'),
        ]);

        first_or_create_family('CAS','CAS' , "Familia cursos d'accés", [
            obtainSpecialityIdByCode('CAS'),
            obtainSpecialityIdByCode('AN'),
            obtainSpecialityIdByCode('MA'),
        ]);
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
     * @param $code
     * @param $shortname
     * @param $name
     * @param $families
     * @param $location
     * @return mixed
     */
    function first_or_create_department($code, $shortname, $name, $families, $location)
    {
        try {
            $department = Department::create([
                'code' => $code,
                'shortname' => $shortname,
                'name' => $name,
                'location_id' => $location
            ]);

            $department->families()->sync($families);

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
        seed_locations();
        //Depends on: location | families . Department head and cap seminari added on staff module
        first_or_create_department("ADM","Administració","Departament d'administració i gestió",
            [obtainFamilyIdByCode('ADM')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("COM","Comerç","Departament de comerç i màrqueting",
            [obtainFamilyIdByCode('COM')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("INF","Informàtica","Departament d'informàtica",
            [obtainFamilyIdByCode('INF')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("ELE","Electricitat","Departament d'electricitat i electrònica",[
            obtainFamilyIdByCode('ELE'),
            obtainFamilyIdByCode('ENE'),
            ],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("EDF","Edificació","Departament d'edificació i obra civil",
            [obtainFamilyIdByCode('EDF')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("MEC", "Mecànica" ,"Departament de fabricació mecànica" ,[
            obtainFamilyIdByCode('MEC'),
            obtainFamilyIdByCode('MAN'),
            ],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("SAN","Sanitat","Departament de sanitat",
            [obtainFamilyIdByCode('SAN')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("SSC","Serveis", "Departament de serveis socioculturals i a la comunitat",
            [obtainFamilyIdByCode('SSC')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("ART","Arts gràfiques","Departament d'Arts gràfiques",
            [obtainFamilyIdByCode('ART')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("CAS","Curs accés","Preparació proves d'accès a superior",
            [obtainFamilyIdByCode('CAS')],
            obtainLocationIdByCode('TODO'));
        first_or_create_department("FOL","Orientació laboral","Departament de formació i orientació laboral" ,
            [obtainFamilyIdByCode('FOL')],
            obtainLocationIdByCode('TODO'));

    }
}

if (! function_exists('first_or_create_classroom()')) {

    /**
     * Create classroom or returns the already existing one.
     *
     * @return mixed
     */
    function first_or_create_classroom($code, $shortname, $name, $location , $shift) {
        try {
            $classroom = Classroom::create([
                'code' => $code,
                'shortname' => $shortname,
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
        //Depends on locations and shifts
        seed_locations();
//        seed_shifts();
        // TODO locations and shifts
        first_or_create_classroom("1ASIX-DAM","1r Informàtica (S)","1r Informàtica (S) ASIX - DAM", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1SMX A","*1r Inform Mitj A","1r Sistemes microinformàtics i xarxes grup A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1SMX B","*1r Inform. mitj B","1r Sistemes microinformàtics i xarxes grup B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1SMX C","*1r Inform. mitj C","1r Sistemes microinformàtics i xarxes grup C", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2SMX A","2n Inform. Mitj A","2n Sistemes microinformàtics i xarxes A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2SMX B","2n Inform. Mitj B","2n Sistemes microinformàtics i xarxes B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1AF","1r Adm. Finan (S)","1r Administració i Finances", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2AF","2n Ad. Finan (S)","2n Administració i finances", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1PRO","1r Projec. Edif.  (S) ","1r Projectes d'edificació", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2PRO","2n D. A. Projec. C (S)","2n Projectes i edificació", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1DIE","1r Dietètica (S) ","1r Dietètica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2DIE","2n Diet","2n Dietètica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1EIN","1r Educació Inf. (S)","1r Educació infantil", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2EIN","2n Educaci","2n Educació infantil", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("GCM","Ges. Comer. Mar.(S)","1r Gestió comerial i màrqueting", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1EE/ 2EE","1-2 Efic. Energ. (S)","1-2 Eficiència energètica i energia solar tèrmica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1SEA","1r Sist. Elect. Auto. (S)","1r Sistemes electrònics i automatitzats", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2SEA","*2n Sist. Electri i automa (S)","2n Sistemes electrotènics i automatitzats", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1INS A","1r Int. Soc. (S) A","1r Integració social (Grup A)", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1INS B","1r Int. Soc. (S) B","1r Integració social (Grup B)", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2INS A","2n Integraci A","2n Integració social A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2INS B","2n Integraci B","2n Integració social B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1PRP","1r Prev. Riscos Prof.(S)","1r Prevenció de riscos professionals", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2PRP","2n Prev. Riscos Prof.(S)","2n Prevenció de riscos professionals", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1PM","1r Prod. Mecanització (S)","1r Programació de la producció en fabricació mecànica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2PM","*2n Prod. Mecanitza.(S) L","2n Programació de la producció en fabricació mecànica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("SE","Secretariat (S)","1r Secretariat", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1STI","1r Sis. Teleco. Infor (S)","1r Sistemes de telecomunicació i informàtics", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2STI","2n Sis. teleco. Infor (S)","2n Sistemes de telecomunicació i informàtics", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1APD A","1r Atenc. Persones Dep. (M) A","1r Atenció a persones en situació de dependència A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1APD B","1r Atenc. Persones Dep. (M) B","1r Atenció a persones en situació de dependència B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2APD A","2n Atenc. Persones Dep.M A","2n Atenció a persones en situació de dependència A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2APD B","2n Atenc. Persones Dep.M B","2n Atenció a persones en situació de dependència B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("COM","*Comer","1r Comerç", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAIA","*Cures Auxiliar Inf(M) A","1r Cures auxiliars d'infermeria A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAIB","*Cures Auxiliar Inf(M) B","1r Cures auxiliars d'infermeria B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAIC","Cures Auxiliar Inf(M)","1r Cures auxiliars d'infermeria", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAI - FCT","CAI - FCT","Cures d'Auxiliar i infermeria - FCT", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1IEA","1r Ins. Elec.  Autom (M)","1r Instal·lacions elèctriques i automàtiques", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2IEA","*2n Ins.Elec,Autom(M)L","2n Instal·lacions elètriques i automàtiques", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1ES","1r Emerg. Sanit. (M)","1r Emergències sanitàries", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2ES","2n Emerg. Sanit.(M)","2n Emergencies sanitaries", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1FAR","1r Farm. Paraf. (M)","1r Farmàcia i parafarmàcia", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2FAR","2n Farm","2n Farmàcia i parafarmàcia", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1GAD A","1r Gestió Adm. (M) A","1r Gestió administrativa A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1GAD B","1r Gestió Adm. (M) B","1r Gestió administrativa B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2GAD","2n Gest. Adm. (M)L","2n Gestió administrativa", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1IME","1r Mant. Elec. (M)","1r Manteniment electromecànic", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2IME","2n Ins. Mant. Elec.(M)","2n Manteniment electromecànic", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1MEC","1r Mecanització","1r Mecanització ", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2MEC","2n Mecanitzaci","2n Mecanització", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2SIC","2n Soldadura i caldereria (M) ","2n Soldadura i calderia", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAM","*Curs Acc","1r Curs d'accès al grau mitjà", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAS A","*Curs Acc A","1r Curs d'accès al grau superior A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("CAS B","*Curs Acc B","1r Curs d'accès al grau superior B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1ARI","1r Auto. Rob. superior","1r Automatització i robòtica industrial ", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2ARI","2n Auto. Rob. superior","2n Automatització i robòtica industrial", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2ASIX","2n Adm Sist Inf xarxa(S)L","2n Administració de sistemes informàtics i xarxes", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2DAM","2n Desenv Aplic Mult (S)L","2n Desenvolupament d'Aplicacions Multiplataforma", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2PM-Dual","*2n Prod. Mecanitza.(S) L DUAL","2n Programació de la producció en fabricació mecànica DUAL", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1ACO","1r Act. Comercial. Mitjà","1r Activitats comercial. Mitjà", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2ACO","2n Act. Comercial.","2n Act. Comercial. Mitjà", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1MAP","1r Màrq. Publicitat (S).","1r Màrqueting i publicitat", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2MAP","2n Màrq. Publicitat (S).","2n Màrqueting i publicitat", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1ADI","1r Assis. Direcció (S).","1r Assistència a la direcció", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2ADI","2n Assis. Direcció (S).","2n Assistència a la direcció", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1LCB","1r Lab. Clin.Biomèdic (S).","1r Laboratori clínic biomèdic", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2LCB","2n Lab. Clin.Biomèdic (S).","2n Laboratori clínic biomèdic", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1PRID","1r Preimpr. digital. Mitjà","1r Preimpressió digital. Mitjà", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2PRID","2n Preimpr. digital. Mitjà","2n Preimpressió digital. Mitjà", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2IT","2n Ins.Telecomunicacions(M)","2n Instal·lacions de Telecomunicacions", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1EE","1 Efic. Energ. (S)","1 Eficiència energètica i energia solar tèrmica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("2EE","2 Efic. Energ. (S)","2 Eficiència energètica i energia solar tèrmica", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1DEPIM","1r Disseny. multimèdia (S)","1r Disseny i edició de publicacions impreses i multimèdia (S)", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
    }
}

if (! function_exists('first_or_create_course()')) {

    /**
     * Create course or returns the already existing one.
     *
     * @param $code
     * @param $name
     * @param $state
     * @param $order
     * @param $studies
     * @return $this|\Illuminate\Database\Eloquent\Model|static
     */
    function first_or_create_course($code, $name, $state, $order, $studies ) {
        try {
            $course = Course::create([
                'code' => $code,
                'name' => $name,
                'state' => $state,
                'order' => $order,
            ]);
            $course->studies()->sync($studies);
            return $course;
        } catch (Illuminate\Database\QueryException $e) {
            return Course::where([
                ['code', '=', $code]
            ]);
        }
    }
}


if (! function_exists('seed_courses()')) {

    /**
     * Seed courses.
     *
     * @return mixed
     */
    function seed_courses()
    {
        seed_studies();
        first_or_create_course("1SMX", "Curs 1 - SMX", "active",1, [ ObtainStudyIdByCode("SMX") ]);
        first_or_create_course("2SMX", "Curs 2 - SMX", "active",2, [ ObtainStudyIdByCode("SMX") ]);
        first_or_create_course("1ASIX-DAM", "Curs 1 - ASIX-DAM", "active",1, [ ObtainStudyIdByCode("ASIX - DAM") ]);
        first_or_create_course("2ASIX", "Curs 2 - ASIX", "active",2, [ ObtainStudyIdByCode("ASIX") ]);
        // 3x2 ASIX/DAM
        first_or_create_course("2DAM", "Curs 2 - DAM", "active",2, [ ObtainStudyIdByCode("DAM") ]);
        first_or_create_course("1AF", "Curs 1 - AF", "active",1, [ ObtainStudyIdByCode("AF") ]);
        first_or_create_course("2AF", "Curs 2 - AF", "active",2, [ ObtainStudyIdByCode("AF") ]);
        first_or_create_course("1GAD", "Curs 1 - GAD", "active",1, [ ObtainStudyIdByCode("GAD") ]);
        first_or_create_course("2GAD", "Curs 2 - GAD", "active",2, [ ObtainStudyIdByCode("GAD") ]);
        first_or_create_course("1GCM", "Curs 1 - GCM", "active",1, [ ObtainStudyIdByCode("GCM") ]);
        first_or_create_course("1COM", "Curs 1 - COM", "active",1, [ ObtainStudyIdByCode("COM") ]);
        first_or_create_course("1PRO", "Curs 1 - PRO", "active",1, [ ObtainStudyIdByCode("PRO") ]);
        first_or_create_course("2PRO", "Curs 2 - PRO", "active",2, [ ObtainStudyIdByCode("PRO") ]);
        first_or_create_course("1IEA", "Curs 1 - IEA", "active",1, [ ObtainStudyIdByCode("IEA") ]);
        first_or_create_course("2IEA", "Curs 2 - IEA", "active",2, [ ObtainStudyIdByCode("IEA") ]);
        //3x2 IEA+IT
        first_or_create_course("2IT", "Curs 2 - IT", "active",2, [ ObtainStudyIdByCode("IT") ]);
        first_or_create_course("1IME", "Curs 1 - IME", "active",1, [ ObtainStudyIdByCode("IME") ]);
        first_or_create_course("2IME", "Curs 2 - IME", "active",2, [ ObtainStudyIdByCode("IME") ]);
        first_or_create_course("1SEA", "Curs 1 - SEA", "active",1, [ ObtainStudyIdByCode("SEA") ]);
        first_or_create_course("2SEA", "Curs 2 - SEA", "active",2, [ ObtainStudyIdByCode("SEA") ]);
        first_or_create_course("1EE", "Curs 1 - EE", "active",1, [ ObtainStudyIdByCode("EE") ]);
        first_or_create_course("2EE", "Curs 2 - EE", "active",2, [ ObtainStudyIdByCode("EE") ]);
        first_or_create_course("1MEC", "Curs 1 - MEC", "active",1, [ ObtainStudyIdByCode("MEC") ]);
        first_or_create_course("2MEC", "Curs 2 - MEC", "active",2, [ ObtainStudyIdByCode("MEC") ]);
        // 3x2 Mecanització + Soldadura
        first_or_create_course("2SIC", "Curs 2 - SIC", "active",2, [ ObtainStudyIdByCode("SIC") ]);

        // TODO ESTUDI PM DUAL!!!!!!!!!!
        first_or_create_course("1PM", "Curs 1 - PM", "active",1, [ ObtainStudyIdByCode("PM") ]);
        first_or_create_course("2PM", "Curs 2 - PM", "active",2, [ ObtainStudyIdByCode("PM") ]);
        first_or_create_course("1PRP", "Curs 1 - PRP", "active",1, [ ObtainStudyIdByCode("PRP") ]);
        first_or_create_course("2PRP", "Curs 2 - PRP", "active",2, [ ObtainStudyIdByCode("PRP") ]);
        first_or_create_course("1ES", "Curs 1 - ES", "active",1, [ ObtainStudyIdByCode("ES") ]);
        first_or_create_course("2ES", "Curs 2 - ES", "active",2, [ ObtainStudyIdByCode("ES") ]);
        first_or_create_course("1FAR", "Curs 1 - FAR", "active",1, [ ObtainStudyIdByCode("FAR") ]);
        first_or_create_course("2FAR", "Curs 2 - FAR", "active",2, [ ObtainStudyIdByCode("FAR") ]);
        first_or_create_course("1DIE", "Curs 1 - DIE", "active",1, [ ObtainStudyIdByCode("DIE") ]);
        first_or_create_course("2DIE", "Curs 2 - DIE", "active",2, [ ObtainStudyIdByCode("DIE") ]);
        first_or_create_course("1LDC", "Curs 1 - LDC", "active",1, [ ObtainStudyIdByCode("LDC") ]);
        first_or_create_course("2LDC", "Curs 2 - LDC", "active",2, [ ObtainStudyIdByCode("LDC") ]);
        first_or_create_course("1CAI", "Curs 1 - CAI", "active",1, [ ObtainStudyIdByCode("CAI") ]);
        first_or_create_course("1EIN", "Curs 1 - EIN", "active",1, [ ObtainStudyIdByCode("EIN") ]);
        first_or_create_course("2EIN", "Curs 2 - EIN", "active",2, [ ObtainStudyIdByCode("EIN") ]);
        first_or_create_course("1INS", "Curs 1 - INS", "active",1, [ ObtainStudyIdByCode("INS") ]);
        first_or_create_course("2INS", "Curs 2 - INS", "active",2, [ ObtainStudyIdByCode("INS") ]);
        first_or_create_course("1APD", "Curs 1 - APD", "active",1, [ ObtainStudyIdByCode("APD") ]);
        first_or_create_course("2APD", "Curs 2 - APD", "active",2, [ ObtainStudyIdByCode("APD") ]);
        first_or_create_course("1CAM", "Curs 1 - CAM", "active",1, [ ObtainStudyIdByCode("CAM") ]);
        first_or_create_course("1CAS", "Curs 1 - CAS", "active",1, [ ObtainStudyIdByCode("CAS") ]);
        first_or_create_course("1ARI", "Curs 1 - ARI", "active",1, [ ObtainStudyIdByCode("ARI") ]);
        first_or_create_course("2ARI", "Curs 2 - ARI", "active",2, [ ObtainStudyIdByCode("ARI") ]);
        first_or_create_course("1AS", "Curs 1 - AS", "active",1, [ ObtainStudyIdByCode("AS") ]);
        first_or_create_course("2AS", "Curs 2 - AS", "active",2, [ ObtainStudyIdByCode("AS") ]);
        first_or_create_course("1MAP", "Curs 1 - MAP", "active",1, [ ObtainStudyIdByCode("MAP") ]);
        first_or_create_course("2MAP", "Curs 2 - MAP", "active",2, [ ObtainStudyIdByCode("MAP") ]);
        first_or_create_course("1ACO", "Curs 1 - ACO", "active",1, [ ObtainStudyIdByCode("ACO") ]);
        first_or_create_course("2ACO", "Curs 2 - ACO", "active",2, [ ObtainStudyIdByCode("ACO") ]);
        first_or_create_course("1ADI", "Curs 1 - ADI", "active",1, [ ObtainStudyIdByCode("ADI") ]);
        first_or_create_course("2ADI", "Curs 2 - ADI", "active",2, [ ObtainStudyIdByCode("ADI") ]);
        first_or_create_course("1LCB", "Curs 1 - LCB", "active",1, [ ObtainStudyIdByCode("LCB") ]);
        first_or_create_course("2LCB", "Curs 2 - LCB", "active",2, [ ObtainStudyIdByCode("LCB") ]);
        first_or_create_course("1PRID", "Curs 1 - PRID", "active",1, [ ObtainStudyIdByCode("PRID") ]);
        first_or_create_course("2PRID", "Curs 2 - PRID", "active",2, [ ObtainStudyIdByCode("PRID") ]);
        first_or_create_course("1DEPIM", "Curs 1 - DEPIM", "active",1, [ ObtainStudyIdByCode("DEPIM") ]);
    }
}

if (! function_exists('first_or_create_module()')) {

    /**
     * Create module or returns the already existing one.
     *
     * @param $code
     * @param $shortname
     * @param $name
     * @param $description
     * @param $state
     * @param $order
     * @param $type
     * @return $this|\Illuminate\Database\Eloquent\Model|static
     */
    function first_or_create_module($code, $shortname, $name, $description, $state, $order, $type)
    {
        try {
            $module = Module::create([
                'code' => $code,
                'shortname' => $shortname,
                'name' => $name,
                'description' => $description,
                'state' => $state,
                'order' => $order,
                'type' => $type,
            ]);
            return $module;
        } catch (Illuminate\Database\QueryException $e) {
            return Module::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('first_or_create_submodule()')) {

    /**
     * Create submodule or returns the already existing one.
     */
    function first_or_create_submodule($code, $shortname, $name, $description, $state, $order, $type, $module, $classrooms)
    {
        try {
            $submodule = Submodule::create([
                'code' => $code,
                'shortname' => $shortname,
                'name' => $name,
                'description' => $description,
                'state' => $state,
                'order' => $order,
                'type' => $type,
                'module_id' => $module
            ]);
            $submodule->classrooms()->sync($classrooms);
            return $submodule;
        } catch (Illuminate\Database\QueryException $e) {
            return Submodule::where([
                ['code', '=', $code]
            ]);
        }
    }
}

if (! function_exists('obtainModuleIdByCode()')) {

    /**
     * Obtain module id by code.
     *
     * @return mixed
     */
    function obtainModuleIdByCode($code)
    {
        return Module::where('code', $code)->first()->id;
    }
}

if (! function_exists('obtainClassroomIdByCode()')) {

    /**
     * Obtain classroom id by code.
     *
     * @return mixed
     */
    function obtainClassroomIdByCode($code)
    {
        return Classroom::where('code', $code)->first()->id;
    }
}



if (! function_exists('seed_submodules_grouped_by_module()')) {

    /**
     * Seed submodules.
     *
     * @return mixed
     */
    function seed_submodules_grouped_by_module()
    {
        first_or_create_module("ACO_MP01","MP01","Dinamització del punt de venda","","active",1,"Normal");
//        function first_or_create_submodule($code, $shortname, $name, $description, $state, $order, $type)
        first_or_create_submodule("ACO_MP01_UF1","UF1","Organització de l'espai comercial i gestió de l'àrea expositiva","","active",1,"Normal",obtainModuleIdByCode("ACO_MP01"), [ obtainClassroomIdByCode("1ACO") ]);




        first_or_create_submodule("UF1","UF1","Organització de l'espai comercial i gestió de l'àrea expositiva","Normal");
        first_or_create_submodule("UF2","UF2","Aparadorisme: Muntatge i manteniment","Normal");
        first_or_create_submodule("UF3","UF3","Accions promocionals en el punt de venda","Normal");
        first_or_create_module("ACO_MP02","MP02","Gestió de compres","","active",2,"Normal");
        first_or_create_submodule("UF1","UF1","Aprovisionament","Normal");
        first_or_create_submodule("UF2","UF2","Procés de compra i seguiment","Normal");
        first_or_create_module("ACO_MP03","MP03","Gestió d'un petit comerç","","active",3,"Normal");
        first_or_create_submodule("UF1","UF1","Emprenedoria i creació d'un petit comerç","Normal");
        first_or_create_submodule("UF2","UF2","Gestió econòmica d'un petit comerç","Normal");
        first_or_create_submodule("UF3","UF3","Procés administratiu, comptable i fiscal","Normal");


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
        seed_departments();
        seed_courses();
        seed_classrooms();
        seed_submodules_grouped_by_module();
    }
}
