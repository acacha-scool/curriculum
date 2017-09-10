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
        first_or_create_study("MAP","Màrqueting i publicitat",obtainLawIdByCode("LOE"));
        first_or_create_study("MEC","Mecanització",obtainLawIdByCode("LOE"));
        first_or_create_study("PM","Programació de la producció en fabricació mecànica",obtainLawIdByCode("LOE"));
        first_or_create_study("PRID","Preimpresió digital",obtainLawIdByCode("LOE"));
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
        first_or_create_classroom("1APD","1r Atenc. Persones Dep. (M)","1r Atenció a persones en situació de dependència", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
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
        first_or_create_classroom("1GAD","1r Gestió Adm. (M)","1r Gestió administrativa", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
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
        first_or_create_classroom("1ACO A","1r Act. Comercial. Mitjà A","1r Activitats comercial. Mitjà A", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
        first_or_create_classroom("1ACO B","1r Act. Comercial. Mitjà B","1r Activitats comercial. Mitjà B", obtainLocationIdByName("20.2"), obtainShiftIdByCode("M"));
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
        dump($code);
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
        first_or_create_submodule("ACO_MP01_UF1","UF1","Organització de l'espai comercial i gestió de l'àrea expositiva","","active",1,"Normal",obtainModuleIdByCode("ACO_MP01"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP01_UF2","UF2","Aparadorisme: Muntatge i manteniment","","active",2,"Normal",obtainModuleIdByCode("ACO_MP01"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP01_UF3","UF3","Accions promocionals en el punt de venda","","active",3,"Normal",obtainModuleIdByCode("ACO_MP01"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_module("ACO_MP02","MP02","Gestió de compres","","active",2,"Normal");
        first_or_create_submodule("ACO_MP02_UF1","UF1","Aprovisionament","","active",1,"Normal",obtainModuleIdByCode("ACO_MP02"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP02_UF2","UF2","Procés de compra i seguiment","","active",2,"Normal",obtainModuleIdByCode("ACO_MP02"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP03","MP03","Gestió d'un petit comerç","","active",3,"Normal");
        first_or_create_submodule("ACO_MP03_UF1","UF1","Emprenedoria i creació d'un petit comerç","","active",1,"Normal",obtainModuleIdByCode("ACO_MP03"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP03_UF2","UF2","Gestió econòmica d'un petit comerç","","active",2,"Normal",obtainModuleIdByCode("ACO_MP03"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP03_UF3","UF3","Procés administratiu, comptable i fiscal","","active",3,"Normal",obtainModuleIdByCode("ACO_MP03"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_module("ACO_MP04","MP04","Processos de venda","","active",4,"Normal");
        first_or_create_submodule("ACO_MP04_UF1","UF1","Venda al consumidor final","","active",1,"Normal",obtainModuleIdByCode("ACO_MP04"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP04_UF2","UF2","Venda a intermediaris, empreses i organitzacions","","active",2,"Normal",obtainModuleIdByCode("ACO_MP04"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP04_UF3","UF3","Terminal punt de venda (TPV) i altres eines de gestió de venda","","active",3,"Normal",obtainModuleIdByCode("ACO_MP04"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_module("ACO_MP05","MP05","Serveis d'atenció comercial","","active",5,"Normal");
        first_or_create_submodule("ACO_MP05_UF1","UF1","Atenció presencial i telefònica al client","","active",1,"Normal",obtainModuleIdByCode("ACO_MP05"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP05_UF2","UF2","Atenció per escrit al client","","active",2,"Normal",obtainModuleIdByCode("ACO_MP05"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP05_UF3","UF3","Serveis al consumidor i gestió de la relació amb clients (CRM)","","active",3,"Normal",obtainModuleIdByCode("ACO_MP05"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP06","MP06","Tècniques de magatzem","","active",6,"Normal");
        first_or_create_submodule("ACO_MP06_UF1","UF1","Organització i seguretat del magatzem","","active",1,"Normal",obtainModuleIdByCode("ACO_MP06"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP06_UF2","UF2","Recepció de mercaderies","","active",2,"Normal",obtainModuleIdByCode("ACO_MP06"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP06_UF3","UF3","Expedició de mercaderies","","active",3,"Normal",obtainModuleIdByCode("ACO_MP06"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP06_UF4","UF4","Inventari i gestió d'estocs","","active",4,"Normal",obtainModuleIdByCode("ACO_MP06"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_module("ACO_MP07","MP07","Venda tècnica","","active",7,"Normal");
        first_or_create_submodule("ACO_MP07_UF1","UF1","Venta de serveis","","active",1,"Normal",obtainModuleIdByCode("ACO_MP07"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP07_UF2","UF2","Venda de productes comercials","","active",2,"Normal",obtainModuleIdByCode("ACO_MP07"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP07_UF3","UF3","Venda de productes industrials, del sector primari i immobiliaris","","active",3,"Normal",obtainModuleIdByCode("ACO_MP07"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP07_UF4","UF4","Telemàrqueting","","active",4,"Normal",obtainModuleIdByCode("ACO_MP07"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP08","MP08","Anglès","","active",8,"Normal");
        first_or_create_submodule("ACO_MP08_UF1","UF1","Anglès tècnic","","active",1,"Normal",obtainModuleIdByCode("ACO_MP08"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP09","MP09","Aplicacions informàtiques pel comerç","","active",9,"Normal");
        first_or_create_submodule("ACO_MP09_UF1","UF1","Tecnologies digitals i eines d'internet per l'empresa","","active",1,"Normal",obtainModuleIdByCode("ACO_MP09"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP09_UF2","UF2","Edició digital de material publicitari","","active",2,"Normal",obtainModuleIdByCode("ACO_MP09"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP09_UF3","UF3","Gestió de bases de dades i fulls de càcul","","active",3,"Normal",obtainModuleIdByCode("ACO_MP09"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_module("ACO_MP10","MP10","Comerç electrònic","","active",10,"Normal");
        first_or_create_submodule("ACO_MP10_UF1","UF1","Gestió de la web i la botiga virtual","","active",1,"Normal",obtainModuleIdByCode("ACO_MP10"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP10_UF2","UF2","Execució del pla de màrqueting digital","","active",2,"Normal",obtainModuleIdByCode("ACO_MP10"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP10_UF3","UF3","Comunicació empresarial en l'entorn digital","","active",3,"Normal",obtainModuleIdByCode("ACO_MP10"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP11","MP11","Màrqueting en l'activitat comercial","","active",11,"Normal");
        first_or_create_submodule("ACO_MP11_UF1","UF1","Màrqueting i investigació de mercats","","active",1,"Normal",obtainModuleIdByCode("ACO_MP11"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP11_UF1","UF1","Recerca d'informació i pla de màqueting","","active",1,"Normal",obtainModuleIdByCode("ACO_MP11"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP11_UF2","UF2","Polítiques comercials i pla de màrqueting","","active",2,"Normal",obtainModuleIdByCode("ACO_MP11"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP11_UF2","UF2","Producte i distribució","","active",2,"Normal",obtainModuleIdByCode("ACO_MP11"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_submodule("ACO_MP11_UF3","UF3","Preu i comunicació","","active",3,"Normal",obtainModuleIdByCode("ACO_MP11"), [ obtainClassroomIdByCode("1ACO A"), obtainClassroomIdByCode("1ACO B")]);
        first_or_create_module("ACO_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("ACO_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("ACO_MP12"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_submodule("ACO_MP12_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("ACO_MP12"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP13","MP13","Projecte d’activitats comercials","","active",13,"Síntesi");
        first_or_create_submodule("ACO_MP13_UF1","UF1","Síntesi d'activitats comercials","","active",1,"Síntesi",obtainModuleIdByCode("ACO_MP13"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ACO_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("ACO_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("ACO_MP14"), [obtainClassroomIdByCode("2ACO")]);
        first_or_create_module("ADI_MP01","MP01","Comunicació i atenció al client","","active",1,"Normal");
        first_or_create_submodule("ADI_MP01_UF1","UF1","Processos de comunicació oral a l'empresa i atenció al client","","active",1,"Normal",obtainModuleIdByCode("ADI_MP01"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP01_UF2","UF2","Processos de comunicació escrita a l'empresa i atenció al client","","active",2,"Normal",obtainModuleIdByCode("ADI_MP01"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP01_UF3","UF3","Gestió documental, arxiu i registre","","active",3,"Normal",obtainModuleIdByCode("ADI_MP01"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP02","MP02","Gestió de la documentació jurídica i empresarial","","active",2,"Normal");
        first_or_create_submodule("ADI_MP02_UF1","UF1","Organització de la documentació jurídica empresarial","","active",1,"Normal",obtainModuleIdByCode("ADI_MP02"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP02_UF2","UF2","Contractació empresarial","","active",2,"Normal",obtainModuleIdByCode("ADI_MP02"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP02_UF3","UF3","Tramitació davant les administracions públiques","","active",3,"Normal",obtainModuleIdByCode("ADI_MP02"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP03","MP03","Procès integral de l'activitat comercial","","active",3,"Normal");
        first_or_create_submodule("ADI_MP03_UF1","UF1","Patrimoni i metodologia comptable","","active",1,"Normal",obtainModuleIdByCode("ADI_MP03"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP03_UF2","UF2","Fiscalitat empresarial","","active",2,"Normal",obtainModuleIdByCode("ADI_MP03"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP03_UF3","UF3","Gestió administrativa de les operacions de compravenda i tresoreria","","active",3,"Normal",obtainModuleIdByCode("ADI_MP03"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP03_UF4","UF4","Registre comptable i comptes anuals","","active",4,"Normal",obtainModuleIdByCode("ADI_MP03"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP04","MP04","Recursos humans i responsabilitat social corporativa","","active",4,"Normal");
        first_or_create_submodule("ADI_MP04_UF1","UF1","Processos administratius de recursos humans","","active",1,"Normal",obtainModuleIdByCode("ADI_MP04"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP04_UF2","UF2","Reclutament i desenvolupament professional","","active",2,"Normal",obtainModuleIdByCode("ADI_MP04"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP05","MP05","Ofimàtica i procès de la informació","","active",5,"Normal");
        first_or_create_submodule("ADI_MP05_UF1","UF1","Tecnologia i comunicacions digitals i processament de dades","","active",1,"Normal",obtainModuleIdByCode("ADI_MP05"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP05_UF2","UF2","Tractament avançat, arxiu i presentació de la informació escrita d'aplicacions","","active",2,"Normal",obtainModuleIdByCode("ADI_MP05"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP05_UF3","UF3","Gestió de dades de dades, disseny de fulls de càlcul i integració d'aplicacions","","active",3,"Normal",obtainModuleIdByCode("ADI_MP05"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP06","MP06","Àngles","","active",6,"Normal");
        first_or_create_submodule("ADI_MP06_UF1","UF1","Àngles tècnic","","active",1,"Normal",obtainModuleIdByCode("ADI_MP06"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("ADI_MP06","MP06","Àngles","","active",6,"Normal");
        first_or_create_submodule("ADI_MP06_UF1","UF1","Àngles tècnic","","active",1,"Normal",obtainModuleIdByCode("ADI_MP06"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP07","MP07","Segona llengua estrangera","","active",7,"Normal");
        first_or_create_submodule("ADI_MP07_UF1","UF1","Segona llengua estrangera","","active",1,"Normal",obtainModuleIdByCode("ADI_MP07"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("ADI_MP08","MP08","Protocol empresarial","","active",8,"Normal");
        first_or_create_submodule("ADI_MP08_UF1","UF1","Relacions públiques en l'entorn empresarial","","active",1,"Normal",obtainModuleIdByCode("ADI_MP08"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP08_UF2","UF2","Tècniques de protocol, empresarial i institucional","","active",2,"Normal",obtainModuleIdByCode("ADI_MP08"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP08_UF3","UF3","Cartes de serveis i compromisos de qualitat","","active",3,"Normal",obtainModuleIdByCode("ADI_MP08"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP08_UF4","UF4","Relacions públiques en l'entorn empresarial 2","","active",4,"Normal",obtainModuleIdByCode("ADI_MP08"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP08_UF5","UF5","Tècniques de protocol, empresarial i institucional 2","","active",5,"Normal",obtainModuleIdByCode("ADI_MP08"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("ADI_MP09","MP09","Organització d'esdeveniments empresarials","","active",9,"Normal");
        first_or_create_submodule("ADI_MP09_UF1","UF1","Coordinació i gestió d'equips de treball","","active",1,"Normal",obtainModuleIdByCode("ADI_MP09"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP09_UF2","UF2","Organització i coordinació d'esdeveniments i projectes","","active",2,"Normal",obtainModuleIdByCode("ADI_MP09"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP09_UF3","UF3","Organització de viatges corporatius","","active",3,"Normal",obtainModuleIdByCode("ADI_MP09"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP09_UF4","UF4","Coordinació i gestió d'equips de treball 2","","active",4,"Normal",obtainModuleIdByCode("ADI_MP09"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP09_UF5","UF5","Organització i coordinació d'esdeveniments i projectes 2","","active",5,"Normal",obtainModuleIdByCode("ADI_MP09"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("ADI_MP10","MP10","Gestió avanzada de la informació","","active",10,"Normal");
        first_or_create_submodule("ADI_MP10_UF1","UF1","Sistemes de gestió documental","","active",1,"Normal",obtainModuleIdByCode("ADI_MP10"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_submodule("ADI_MP10_UF2","UF2","Gestió informatitzada de projectes empresarial","","active",2,"Normal",obtainModuleIdByCode("ADI_MP10"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("ADI_MP11","MP11","Formació i  orientació laboral","","active",11,"Externes");
        first_or_create_submodule("ADI_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("ADI_MP11"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_submodule("ADI_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("ADI_MP11"), [obtainClassroomIdByCode("1ADI")]);
        first_or_create_module("ADI_MP12","MP12","Projecte d'assistència a la direcció","","active",12,"Síntesi");
        first_or_create_submodule("ADI_MP12_UF1","UF1","Projectes d'asistència a la direcció","","active",1,"Síntesi",obtainModuleIdByCode("ADI_MP12"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("ADI_MP13","MP13","Formació en centres de treball","","active",13,"FCT");
        first_or_create_submodule("ADI_MP13_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("ADI_MP13"), [obtainClassroomIdByCode("2ADI")]);
        first_or_create_module("AF_MP01","MP01","Comunicació i atenció al client","","active",1,"Normal");
        first_or_create_submodule("AF_MP01_UF1","UF1","Processos de comunicació oral a l'empresa i atenció al client","","active",1,"Normal",obtainModuleIdByCode("AF_MP01"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP01_UF2","UF2","Processos de comunicació escrita a l'empres i atenció al client","","active",2,"Normal",obtainModuleIdByCode("AF_MP01"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP01_UF3","UF3","Gestió documental, arxiu i registre","","active",3,"Normal",obtainModuleIdByCode("AF_MP01"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP02","MP02","Gestió de la documentació jurídica i empresarial","","active",2,"Normal");
        first_or_create_submodule("AF_MP02_UF1","UF1","Organització de la documentació jurídica empresarial","","active",1,"Normal",obtainModuleIdByCode("AF_MP02"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP02_UF2","UF2","Contractació empresarial","","active",2,"Normal",obtainModuleIdByCode("AF_MP02"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP02_UF3","UF3","Tramitació davant les administracions públiques","","active",3,"Normal",obtainModuleIdByCode("AF_MP02"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP03","MP03","Procés integral de l'activitat comercial","","active",3,"Normal");
        first_or_create_submodule("AF_MP03_UF1","UF1","Patrimoni i metodologia comptable","","active",1,"Normal",obtainModuleIdByCode("AF_MP03"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP03_UF2","UF2","Fiscalitat empresarial","","active",2,"Normal",obtainModuleIdByCode("AF_MP03"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP03_UF3","UF3","Gestió administrativa de les operacions de compravenda i tresoreria","","active",3,"Normal",obtainModuleIdByCode("AF_MP03"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP03_UF4","UF4","Registre comptable i comptes anuals","","active",4,"Normal",obtainModuleIdByCode("AF_MP03"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP04","MP04","Recursos humans i responsabilitat social corporativa","","active",4,"Normal");
        first_or_create_submodule("AF_MP04_UF1","UF1","Processos administratius de recursos humans","","active",1,"Normal",obtainModuleIdByCode("AF_MP04"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP04_UF2","UF2","Reclutament i desenvolupament professional","","active",2,"Normal",obtainModuleIdByCode("AF_MP04"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP05","MP05","Ofimàtica i procés de la informació","","active",5,"Normal");
        first_or_create_submodule("AF_MP05_UF1","UF1","Tecnologia i comunicacions digitals i processament de dades","","active",1,"Normal",obtainModuleIdByCode("AF_MP05"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP05_UF2","UF2","Tractament avançat, arxiu i presentació de la informació escrita d'aplicacions","","active",2,"Normal",obtainModuleIdByCode("AF_MP05"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP05_UF3","UF3","Gestió de bases de dades, disseny de fulls de càlcul i integració d'aplicacions","","active",3,"Normal",obtainModuleIdByCode("AF_MP05"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP06","MP06","Anglès","","active",6,"Externes");
        first_or_create_submodule("AF_MP06_UF1","UF1","Anglès tènic","","active",1,"Externes",obtainModuleIdByCode("AF_MP06"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP06","MP06","Anglès","","active",6,"Externes");
        first_or_create_submodule("AF_MP06_UF1","UF1","Anglès tènic","","active",1,"Externes",obtainModuleIdByCode("AF_MP06"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP07","MP07","Gestió de recursos humans","","active",7,"Normal");
        first_or_create_submodule("AF_MP07_UF1","UF1","Procés de contractació","","active",1,"Normal",obtainModuleIdByCode("AF_MP07"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP07_UF2","UF2","Retribucions, nòmines i obligacions oficials","","active",2,"Normal",obtainModuleIdByCode("AF_MP07"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP08","MP08","Gestió financera","","active",8,"Normal");
        first_or_create_submodule("AF_MP08_UF1","UF1","Anàlisi i previsió financeres","","active",1,"Normal",obtainModuleIdByCode("AF_MP08"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP08_UF2","UF2","Productes del mercat financer i d'assegurances","","active",2,"Normal",obtainModuleIdByCode("AF_MP08"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP08_UF3","UF3","Fonts de finançament i selecció d'inversions","","active",3,"Normal",obtainModuleIdByCode("AF_MP08"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP09","MP09","Comptabilitat i fiscalitat","","active",9,"Normal");
        first_or_create_submodule("AF_MP09_UF1","UF1","Comptabilitat financera, fiscabilitat i auditoria","","active",1,"Normal",obtainModuleIdByCode("AF_MP09"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP09_UF2","UF2","Comptabilitat de costos","","active",2,"Normal",obtainModuleIdByCode("AF_MP09"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP09_UF3","UF3","Anàlisi econòmic, patrimonial i financer","","active",3,"Normal",obtainModuleIdByCode("AF_MP09"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP10","MP10","Gestió logistica i comercial","","active",10,"Normal");
        first_or_create_submodule("AF_MP10_UF1","UF1","Planificació de l'aprovisionament","","active",1,"Normal",obtainModuleIdByCode("AF_MP10"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP10_UF2","UF2","Selecció i control de proveïdors","","active",2,"Normal",obtainModuleIdByCode("AF_MP10"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_submodule("AF_MP10_UF3","UF3","Operativa i control de la cadena logística","","active",3,"Normal",obtainModuleIdByCode("AF_MP10"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP11","MP11","Simulació empresarial","","active",11,"Normal");
        first_or_create_submodule("AF_MP11_UF1","UF1","Simulació empresarial","","active",1,"Normal",obtainModuleIdByCode("AF_MP11"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("AF_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("AF_MP12"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_submodule("AF_MP12_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("AF_MP12"), [obtainClassroomIdByCode("1AF")]);
        first_or_create_module("AF_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("AF_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("AF_MP12"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP13","MP13","Projecte d'administració i finances","","active",13,"Síntesi");
        first_or_create_submodule("AF_MP13_UF1","UF1","Projecte d'administració i finances","","active",1,"Síntesi",obtainModuleIdByCode("AF_MP13"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("AF_MP14","MP14","Formació en centres de treball","","active",14,"Externes");
        first_or_create_submodule("AF_MP14_UF1","UF1","Formació en centres de treball","","active",1,"Externes",obtainModuleIdByCode("AF_MP14"), [obtainClassroomIdByCode("2AF")]);
        first_or_create_module("APD_MP01","MP01","Organització de l'atenció a persones en situació de dependència","","active",1,"Normal");
        first_or_create_submodule("APD_MP01_UF1","UF1","Context de la intervenció sociosanitària","","active",1,"Normal",obtainModuleIdByCode("APD_MP01"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP01_UF2","UF2","Organització de la intervenció sociosanitària","","active",2,"Normal",obtainModuleIdByCode("APD_MP01"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_module("APD_MP02","MP02","Atenció sanitària","","active",2,"Normal");
        first_or_create_submodule("APD_MP02_UF1","UF1","Mobilització de persones en situació de dependència","","active",1,"Normal",obtainModuleIdByCode("APD_MP02"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP02_UF2","UF2","Activitats d'assistència sanitària","","active",2,"Normal",obtainModuleIdByCode("APD_MP02"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP02_UF3","UF3","Suport en la ingesta","","active",3,"Normal",obtainModuleIdByCode("APD_MP02"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP02_UF4","UF4","Aplicació de tractaments per a persones en situació de dependència","","active",4,"Normal",obtainModuleIdByCode("APD_MP02"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_module("APD_MP03","MP03","Atenció higiènica","","active",3,"Normal");
        first_or_create_submodule("APD_MP03_UF1","UF1","Higiene personal","","active",1,"Normal",obtainModuleIdByCode("APD_MP03"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP03_UF2","UF2","Higiene de l'entorn","","active",2,"Normal",obtainModuleIdByCode("APD_MP03"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_module("APD_MP04","MP04","Atenció i suport psicosocial","","active",4,"Normal");
        first_or_create_submodule("APD_MP04_UF1","UF1","Suport en el desenvolupament dels hàbits d'autonomia personal i social","","active",1,"Normal",obtainModuleIdByCode("APD_MP04"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP04_UF2","UF2","Suport en l'estimulació cognitiva de les persones","","active",2,"Normal",obtainModuleIdByCode("APD_MP04"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP04_UF3","UF3","Suport en l'animació grupal","","active",3,"Normal",obtainModuleIdByCode("APD_MP04"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP04_UF4","UF4","Suport en el desenvolupament de les relacions socials","","active",4,"Normal",obtainModuleIdByCode("APD_MP04"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_module("APD_MP05","MP05","Característiques i necessitats de les persones en situació de dependència","","active",5,"Normal");
        first_or_create_submodule("APD_MP05_UF1","UF1","Autonomia personal","","active",1,"Normal",obtainModuleIdByCode("APD_MP05"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP05_UF2","UF2","Persones grans","","active",2,"Normal",obtainModuleIdByCode("APD_MP05"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP05_UF3","UF3","Persones amb malaltia mental","","active",3,"Normal",obtainModuleIdByCode("APD_MP05"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP05_UF4","UF4","Persones amb discapacitat intel·lectual","","active",4,"Normal",obtainModuleIdByCode("APD_MP05"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP05_UF5","UF5","Persones amb discapacitat física","","active",5,"Normal",obtainModuleIdByCode("APD_MP05"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_module("APD_MP06","MP06","Teleassistència","","active",6,"Normal");
        first_or_create_submodule("APD_MP06_UF1","UF1","Teleassistència","","active",1,"Normal",obtainModuleIdByCode("APD_MP06"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP07","MP07","Suport domiciliari","","active",7,"Normal");
        first_or_create_submodule("APD_MP07_UF1","UF1","Organització del treball domiciliari","","active",1,"Normal",obtainModuleIdByCode("APD_MP07"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_submodule("APD_MP07_UF2","UF2","Gestió i administració de la llar","","active",2,"Normal",obtainModuleIdByCode("APD_MP07"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_submodule("APD_MP07_UF3","UF3","Gestió i preparació de l'alimentació","","active",3,"Normal",obtainModuleIdByCode("APD_MP07"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_submodule("APD_MP07_UF4","UF4","Manteniment i neteja de la llar","","active",4,"Normal",obtainModuleIdByCode("APD_MP07"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP08","MP08","Suport en la comunicació","","active",8,"Normal");
        first_or_create_submodule("APD_MP08_UF1","UF1","Suport en la comunicació","","active",1,"Normal",obtainModuleIdByCode("APD_MP08"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP09","MP09","Destreses socials","","active",9,"Normal");
        first_or_create_submodule("APD_MP09_UF1","UF1","Habilitats socials del professional","","active",1,"Normal",obtainModuleIdByCode("APD_MP09"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_submodule("APD_MP09_UF2","UF2","Treball en equip","","active",2,"Normal",obtainModuleIdByCode("APD_MP09"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP10","MP10","Primers auxilis","","active",10,"Normal");
        first_or_create_submodule("APD_MP10_UF1","UF1","Recursos i trasllat d'accidentats","","active",1,"Normal",obtainModuleIdByCode("APD_MP10"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_submodule("APD_MP10_UF2","UF2","Suport Vital Bàsic (SVB) i ús dels desfibril·ladors","","active",2,"Normal",obtainModuleIdByCode("APD_MP10"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_submodule("APD_MP10_UF3","UF3","Atenció sanitària d'urgència","","active",3,"Normal",obtainModuleIdByCode("APD_MP10"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("APD_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("APD_MP11"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_submodule("APD_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("APD_MP11"), [obtainClassroomIdByCode("1APD") ]);
        first_or_create_module("APD_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("APD_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("APD_MP12"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP13","MP13","Anglès","","active",13,"Externes");
        first_or_create_submodule("APD_MP13_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("APD_MP13"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP14","MP14","Projecte de síntesi","","active",14,"Síntesi");
        first_or_create_submodule("APD_MP14_UF1","UF1","Projecte de síntesi","","active",1,"Síntesi",obtainModuleIdByCode("APD_MP14"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("APD_MP15","MP15","Formació en centres de treball","","active",15,"FCT");
        first_or_create_submodule("APD_MP15_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("APD_MP15"), [obtainClassroomIdByCode("2APD A"), obtainClassroomIdByCode("2APD B")]);
        first_or_create_module("ARI_MP01","MP01","Sistemes elèctrics, pneumàtics i hidràulics","","active",1,"Normal");
        first_or_create_submodule("ARI_MP01_UF1","UF1","Automatització elèctrica cablada","","active",1,"Normal",obtainModuleIdByCode("ARI_MP01"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP01_UF2","UF2","Automatització pneumàtica i electropneumàtica","","active",2,"Normal",obtainModuleIdByCode("ARI_MP01"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP01_UF3","UF3","Automatització hidràulica i electrohidràulica","","active",3,"Normal",obtainModuleIdByCode("ARI_MP01"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP02","MP02","Sistemes seqüencials programables","","active",2,"Normal");
        first_or_create_submodule("ARI_MP02_UF1","UF1","Instal·lació i muntatge de PLCs","","active",1,"Normal",obtainModuleIdByCode("ARI_MP02"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP02_UF2","UF2","Programació de PLCs","","active",2,"Normal",obtainModuleIdByCode("ARI_MP02"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP02_UF3","UF3","Disseny de sistemes combinacionals i seqüencials","","active",3,"Normal",obtainModuleIdByCode("ARI_MP02"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP02","MP02","Sistemes seqüencials programables","","active",2,"Normal");
        first_or_create_submodule("ARI_MP02_UF4","UF4","M2 DUAL","","active",4,"Normal",obtainModuleIdByCode("ARI_MP02"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP03","MP03","Sistemes de mesura i regulació","","active",3,"Normal");
        first_or_create_submodule("ARI_MP03_UF1","UF1","Sensors, sistemes de condicionament i mesura i dispositius d'accionament","","active",1,"Normal",obtainModuleIdByCode("ARI_MP03"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP03_UF2","UF2","Sistemes de regulació automàtica","","active",2,"Normal",obtainModuleIdByCode("ARI_MP03"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP03_UF3","UF3","Sistemes de mesura virtual i adquisició de dades","","active",3,"Normal",obtainModuleIdByCode("ARI_MP03"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP03","MP03","Sistemes de mesura i regulació","","active",3,"Normal");
        first_or_create_submodule("ARI_MP03_UF4","UF4","M3 DUAL","","active",4,"Normal",obtainModuleIdByCode("ARI_MP03"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP04","MP04","Sistemes de poténcia","","active",4,"Normal");
        first_or_create_submodule("ARI_MP04_UF1","UF1","Configuració d'instal·lacions elèctriques","","active",1,"Normal",obtainModuleIdByCode("ARI_MP04"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP04_UF2","UF2","Màquines elèctriques","","active",2,"Normal",obtainModuleIdByCode("ARI_MP04"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP04_UF3","UF3","Electrònica de potència","","active",3,"Normal",obtainModuleIdByCode("ARI_MP04"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP04","MP04","Sistemes de poténcia","","active",4,"Normal");
        first_or_create_submodule("ARI_MP04_UF4","UF4","M4 DUAL","","active",4,"Normal",obtainModuleIdByCode("ARI_MP04"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP05","MP05","Documentació tècnica en automatització i robòtica industrial","","active",5,"Normal");
        first_or_create_submodule("ARI_MP05_UF1","UF1","Documentació gràfica en projectes d’automatització i robòtica industrial","","active",1,"Normal",obtainModuleIdByCode("ARI_MP05"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP05_UF2","UF2","Documentació escrita en projectes d’automatització i robòtica industrial","","active",2,"Normal",obtainModuleIdByCode("ARI_MP05"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP05_UF3","UF3","Pressupostos en projectes d’automatització i robòtica industrial","","active",3,"Normal",obtainModuleIdByCode("ARI_MP05"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP05","MP05","Documentació tècnica en automatització i robòtica industrial","","active",5,"Normal");
        first_or_create_submodule("ARI_MP05_UF4","UF4","M5 DUAL","","active",4,"Normal",obtainModuleIdByCode("ARI_MP05"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP06","MP06","Sistemes programables avançats","","active",6,"Normal");
        first_or_create_submodule("ARI_MP06_UF1","UF1","Sistemes avançats de control industrial","","active",1,"Normal",obtainModuleIdByCode("ARI_MP06"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP06_UF2","UF2","Sensors avançats","","active",2,"Normal",obtainModuleIdByCode("ARI_MP06"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP06_UF3","UF3","M6 DUAL","","active",3,"Normal",obtainModuleIdByCode("ARI_MP06"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP07","MP07","Robòtica industrial","","active",7,"Normal");
        first_or_create_submodule("ARI_MP07_UF1","UF1","Configuració de robots industrials","","active",1,"Normal",obtainModuleIdByCode("ARI_MP07"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP07_UF2","UF2","Programació de robots industrials","","active",2,"Normal",obtainModuleIdByCode("ARI_MP07"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP07_UF3","UF3","Manteniment de robots industrials","","active",3,"Normal",obtainModuleIdByCode("ARI_MP07"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP07_UF4","UF4","Serveis d'accionaments","","active",4,"Normal",obtainModuleIdByCode("ARI_MP07"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP08","MP08","Comunicacions industrials","","active",8,"Normal");
        first_or_create_submodule("ARI_MP08_UF1","UF1","Estructures i protocols de comunicacions industrials","","active",1,"Normal",obtainModuleIdByCode("ARI_MP08"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP08","MP08","Comunicacions industrials","","active",8,"Normal");
        first_or_create_submodule("ARI_MP08_UF1","UF1","Estructures i protocols de comunicacions industrials","","active",1,"Normal",obtainModuleIdByCode("ARI_MP08"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP08_UF2","UF2","Sistemes de control i supervisió de processos","","active",2,"Normal",obtainModuleIdByCode("ARI_MP08"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP08_UF3","UF3","Xarxes industrial","","active",3,"Normal",obtainModuleIdByCode("ARI_MP08"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP08_UF4","UF4","Sistemes d'accés remot a processos indistrials","","active",4,"Normal",obtainModuleIdByCode("ARI_MP08"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP08_UF5","UF5","M8 DUAL","","active",5,"Normal",obtainModuleIdByCode("ARI_MP08"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP09","MP09","Integració de sistemes d’automatització industrial","","active",9,"Normal");
        first_or_create_submodule("ARI_MP09_UF1","UF1","Integració de sistemes d'automatització industrial","","active",1,"Normal",obtainModuleIdByCode("ARI_MP09"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP09_UF2","UF2","Muntatge, programació i ajust dels sistemes","","active",2,"Normal",obtainModuleIdByCode("ARI_MP09"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP09_UF3","UF3","Posada en marxa dels sistemes d'automatització","","active",3,"Normal",obtainModuleIdByCode("ARI_MP09"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP09_UF4","UF4","Planificació i gestió del manteniment dels sistemes d'automatització","","active",4,"Normal",obtainModuleIdByCode("ARI_MP09"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP09_UF5","UF5","M9 DUAL","","active",5,"Normal",obtainModuleIdByCode("ARI_MP09"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP10","MP10","Informàtica industrial","","active",10,"Normal");
        first_or_create_submodule("ARI_MP10_UF1","UF1","Equips, xarxes locals i entorn Web","","active",1,"Normal",obtainModuleIdByCode("ARI_MP10"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP10_UF2","UF2","Programació d'equips i sistemes industrials","","active",2,"Normal",obtainModuleIdByCode("ARI_MP10"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("ARI_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("ARI_MP11"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_submodule("ARI_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("ARI_MP11"), [obtainClassroomIdByCode("1ARI")]);
        first_or_create_module("ARI_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("ARI_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("ARI_MP12"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP13","MP13","Projecte d'Automatizació i robòtica industrial","","active",13,"Síntesi");
        first_or_create_submodule("ARI_MP13_UF1","UF1","Projecte d'automatització i robòtica industrial","","active",1,"Síntesi",obtainModuleIdByCode("ARI_MP13"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_submodule("ARI_MP13_UF2","UF2","M13 DUAL","","active",2,"Síntesi",obtainModuleIdByCode("ARI_MP13"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ARI_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("ARI_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("ARI_MP14"), [obtainClassroomIdByCode("2ARI")]);
        first_or_create_module("ASIX_MP01","MP01","Implementació de sistemes operatius(ASIX)","","active",1,"Normal");
        first_or_create_submodule("ASIX_MP01_UF4","UF4","Seguretat, rendiment i recursos","","active",4,"Normal",obtainModuleIdByCode("ASIX_MP01"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP01","MP01","Implantació de sistemes operatius(ASIX) - Implementació de sistemes informàtics(DAM)","","active",1,"Normal");
        first_or_create_submodule("ASIX_MP01_UF1","UF1","Instal·lació, configuració i explotació del sistema informàtic","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP01"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP01_UF2","UF2","Gestió de la informació i de recursos en una xarxa","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP01"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP01_UF3","UF3","Implantació de programari específic","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP01"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP02","MP02","Gestió de bases de dades","","active",2,"Normal");
        first_or_create_submodule("ASIX_MP02_UF1","UF1","Introducció a les bases de dades","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP02"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP02_UF2","UF2","Llenguatges SQL: DML i DDL","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP02"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP02","MP02","Gestió de bases de dades","","active",2,"Normal");
        first_or_create_submodule("ASIX_MP02_UF3","UF3","Assegurament de la informació","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP02"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP03","MP03","Programació bàsica","","active",3,"Normal");
        first_or_create_submodule("ASIX_MP03_UF1","UF1","Programació estructurada","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP03"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP03_UF2","UF2","Disseny modular","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP03"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP03_UF3","UF3","Fonaments de gestió de fitxers","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP03"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP04","MP04","Llenguatges de marques i sistemes de gestió d'informació","","active",4,"Normal");
        first_or_create_submodule("ASIX_MP04_UF1","UF1","Programació amb XML","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP04"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP04_UF2","UF2","Àmbits d'aplicació de l'XML","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP04"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP04_UF3","UF3","Sistemes de gestió d'informació empresarial","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP04"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP05","MP05","Fonaments de maquinari","","active",5,"Normal");
        first_or_create_submodule("ASIX_MP05_UF1","UF1","Arquitectura de sistemes","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP05"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP05_UF2","UF2","Instal·lació, configuració i recuperació de programari","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP05"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP05_UF3","UF3","Implantació i manteniment de CPD","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP05"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP06","MP06","Administració de sistemes operatius","","active",6,"Normal");
        first_or_create_submodule("ASIX_MP06_UF1","UF1","Administració avançada de sistemes operatius","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP06"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP06_UF2","UF2","Automatització de tasques i llenguatges de guions","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP06"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP07","MP07","Planificació i administració de xarxes","","active",7,"Normal");
        first_or_create_submodule("ASIX_MP07_UF1","UF1","Introducció a les xarxes","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP07"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP07_UF2","UF2","Administració de dispositius de xarxa","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP07"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP07_UF3","UF3","Administració avançada de xarxes","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP07"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP08","MP08","Serveis de xarxa i internet","","active",8,"Normal");
        first_or_create_submodule("ASIX_MP08_UF1","UF1","Serveis de noms i configuració automàtica","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP08"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP08_UF2","UF2","Serveis Web i de transferència de fitxers","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP08"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP08_UF3","UF3","Correu electrònic i missatgeria","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP08"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP08_UF4","UF4","Serveis d'audio i video","","active",4,"Normal",obtainModuleIdByCode("ASIX_MP08"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP09","MP09","Implementació d'aplicacions web","","active",9,"Normal");
        first_or_create_submodule("ASIX_MP09_UF1","UF1","Llenguatges de guions de servidor","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP09"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP09_UF2","UF2","Implantació de gestors de continguts","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP09"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP10","MP10","Administració de sistemes gestors de bases de dades","","active",10,"Normal");
        first_or_create_submodule("ASIX_MP10_UF2","UF2","Instal·lació i ajustament de SGBD corporatiu","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP10"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP10","MP10","Administració de sistemes gestors de bases de dades","","active",10,"Normal");
        first_or_create_submodule("ASIX_MP10_UF1","UF1","Llenguatges SQL: DCL i extensió procedimental","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP10"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP11","MP11","Seguretat i alta disponibilitat","","active",11,"Normal");
        first_or_create_submodule("ASIX_MP11_UF1","UF1","Seguretat física, lògica i legislació","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP11"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP11_UF2","UF2","Seguretat activa i accés remot","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP11"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP11_UF3","UF3","Tallafocs i servidors intermediaris","","active",3,"Normal",obtainModuleIdByCode("ASIX_MP11"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP11_UF4","UF4","Alta disponibilitat","","active",4,"Normal",obtainModuleIdByCode("ASIX_MP11"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("ASIX_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("ASIX_MP12"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_submodule("ASIX_MP12_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("ASIX_MP12"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP13","MP13","Empresa i iniciativa emprenedora","","active",13,"Normal");
        first_or_create_submodule("ASIX_MP13_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP13"), [obtainClassroomIdByCode("1ASIX-DAM")]);
        first_or_create_module("ASIX_MP14","MP14","Projecte d'ASIX","","active",14,"Síntesi");
        first_or_create_submodule("ASIX_MP14_UF1","UF1","Projecte d'ASIX","","active",1,"Síntesi",obtainModuleIdByCode("ASIX_MP14"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP15","MP15","Formació en centres de treball","","active",15,"FCT");
        first_or_create_submodule("ASIX_MP15_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("ASIX_MP15"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("ASIX_MP16","MP16","Xarxes WAN obertes sense fils","","active",16,"Normal");
        first_or_create_submodule("ASIX_MP16_UF1","UF1","Introducció a les xarxes GUIFI","","active",1,"Normal",obtainModuleIdByCode("ASIX_MP16"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_submodule("ASIX_MP16_UF2","UF2","Administració i manteniment de dispositius GUIFI","","active",2,"Normal",obtainModuleIdByCode("ASIX_MP16"), [obtainClassroomIdByCode("2ASIX")]);
        first_or_create_module("CAI_C1","C1","Operacions administratives i documentació sanitària","","active",1,"Normal");
        first_or_create_submodule("CAI_C1_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C1"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C10","C10","Relacions en l'equip de treball","","active",10,"Normal");
        first_or_create_submodule("CAI_C10_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C10"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C11","C11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("CAI_C11_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("CAI_C11"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C12","C12","Formació en centres de treball","","active",12,"FCT");
        first_or_create_submodule("CAI_C12_UD G","UD G","Unitat didàctica gobal","","active",1,"FCT",obtainModuleIdByCode("CAI_C12"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C13","C13","Projecte de síntesi","","active",13,"Síntesi");
        first_or_create_submodule("CAI_C13_UD G","UD G","Unitat didàctica gobal","","active",1,"Síntesi",obtainModuleIdByCode("CAI_C13"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C2","C2","L'ésser humà davant la malaltia","","active",2,"Normal");
        first_or_create_submodule("CAI_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C2"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C3","C3","Benestar del pacient. Necessitats d'higiene, repòs i moviment","","active",3,"Normal");
        first_or_create_submodule("CAI_C3_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C3"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C4","C4","Cures bàsiques d'infermeria","","active",4,"Normal");
        first_or_create_submodule("CAI_C4_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C4"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C5","C5","Primers auxilis","","active",5,"Normal");
        first_or_create_submodule("CAI_C5_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C5"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C6","C6","Higiene del medi hospitalari i neteja del material","","active",6,"Normal");
        first_or_create_submodule("CAI_C6_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C6"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C7","C7","Recolzament psicològic al pacient/client","","active",7,"Normal");
        first_or_create_submodule("CAI_C7_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C7"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C8","C8","Educació per la salut","","active",8,"Normal");
        first_or_create_submodule("CAI_C8_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C8"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAI_C9","C9","Tècniques d'ajuda odontològica/estomatològica","","active",9,"Normal");
        first_or_create_submodule("CAI_C9_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAI_C9"), [obtainClassroomIdByCode("CAIA"), obtainClassroomIdByCode("CAIB"), obtainClassroomIdByCode("CAIC"), obtainClassroomIdByCode("CAI - FCT")]);
        first_or_create_module("CAM_AN","AN","Anglès","","active",1,"Normal");
        first_or_create_submodule("CAM_AN_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_AN"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_CA","CA","Llengua catalana","","active",1,"Normal");
        first_or_create_submodule("CAM_CA_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_CA"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_CAS","CAS","Llengua Castellana","","active",1,"Normal");
        first_or_create_submodule("CAM_CAS_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_CAS"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_CS","CS","Ciències socials","","active",1,"Normal");
        first_or_create_submodule("CAM_CS_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_CS"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_EST","EST","Estructures comunes","","active",1,"Normal");
        first_or_create_submodule("CAM_EST_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_EST"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_MA","MA","Matemàtiques","","active",1,"Normal");
        first_or_create_submodule("CAM_MA_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_MA"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_OP","OP","Optativa","","active",1,"Normal");
        first_or_create_submodule("CAM_OP_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_OP"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAM_TU","TU","Tutoria","","active",1,"Normal");
        first_or_create_submodule("CAM_TU_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAM_TU"), [obtainClassroomIdByCode("CAM")]);
        first_or_create_module("CAS_AN","AN","Anglès","","active",1,"Normal");
        first_or_create_submodule("CAS_AN_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAS_AN"), [obtainClassroomIdByCode("CAS A"), obtainClassroomIdByCode("CAS B")]);
        first_or_create_module("CAS_CA","CA","Llengua catalana","","active",1,"Normal");
        first_or_create_submodule("CAS_CA_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAS_CA"), [obtainClassroomIdByCode("CAS A"), obtainClassroomIdByCode("CAS B")]);
        first_or_create_module("CAS_CAS","CAS","Llengua castellana","","active",1,"Normal");
        first_or_create_submodule("CAS_CAS_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAS_CAS"), [obtainClassroomIdByCode("CAS A"), obtainClassroomIdByCode("CAS B")]);
        first_or_create_module("CAS_EST","EST","Estructures comunes","","active",1,"Normal");
        first_or_create_submodule("CAS_EST_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAS_EST"), [obtainClassroomIdByCode("CAS A"), obtainClassroomIdByCode("CAS B")]);
        first_or_create_module("CAS_MA","MA","Matemàtiques","","active",1,"Normal");
        first_or_create_submodule("CAS_MA_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAS_MA"), [obtainClassroomIdByCode("CAS A"), obtainClassroomIdByCode("CAS B")]);
        first_or_create_module("CAS_OP","OP","Optativa","","active",1,"Normal");
        first_or_create_submodule("CAS_OP_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("CAS_OP"), [obtainClassroomIdByCode("CAS A"), obtainClassroomIdByCode("CAS B")]);
        first_or_create_module("COM_C1","C1","Operacions d'emmagatzematge","","active",1,"Normal");
        first_or_create_submodule("COM_C1_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C1"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C10","C10","Formació en centres de treball","","active",10,"FCT");
        first_or_create_submodule("COM_C10_UD G","UD G","Unitat didàctica gobal","","active",1,"FCT",obtainModuleIdByCode("COM_C10"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C2","C2","Tècniques de marxandatge","","active",2,"Normal");
        first_or_create_submodule("COM_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C2"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C3","C3","Aparadorisme i publicitat en el punt de venda","","active",3,"Normal");
        first_or_create_submodule("COM_C3_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C3"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C4","C4","Tècniques de venda","","active",4,"Normal");
        first_or_create_submodule("COM_C4_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C4"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C5","C5","Activitats de venda","","active",5,"Normal");
        first_or_create_submodule("COM_C5_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C5"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C6","C6","Administració i gestió d'un petit establiment comercial","","active",6,"Normal");
        first_or_create_submodule("COM_C6_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C6"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C7","C7","Aplicacions informàtiques de propòsit general","","active",7,"Normal");
        first_or_create_submodule("COM_C7_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C7"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C8","C8","Llengua estrangera (Anglès)","","active",8,"Normal");
        first_or_create_submodule("COM_C8_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("COM_C8"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("COM_C9","C9","Formació i orientació laboral","","active",9,"Externes");
        first_or_create_submodule("COM_C9_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("COM_C9"), [obtainClassroomIdByCode("COM")]);
        first_or_create_module("DAM_MP02","MP02","Bases de dades","","active",2,"Normal");
        first_or_create_submodule("DAM_MP02_UF4","UF4","Bases de dades objecte-relacionals","","active",4,"Normal",obtainModuleIdByCode("DAM_MP02"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP03","MP03","Programació","","active",3,"Normal");
        first_or_create_submodule("DAM_MP03_UF4","UF4","Programació orientada a objectes (POO). Fonaments","","active",4,"Normal",obtainModuleIdByCode("DAM_MP03"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP03_UF5","UF5","POO. Llibreries de classes fonamentals","","active",5,"Normal",obtainModuleIdByCode("DAM_MP03"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP03_UF6","UF6","POO. Introducció a la persistència en BD","","active",6,"Normal",obtainModuleIdByCode("DAM_MP03"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP05","MP05","Entorns de desenvolupament","","active",5,"Normal");
        first_or_create_submodule("DAM_MP05_UF1","UF1","Desenvolupament de programari","","active",1,"Normal",obtainModuleIdByCode("DAM_MP05"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP05_UF2","UF2","Optimització del programari","","active",2,"Normal",obtainModuleIdByCode("DAM_MP05"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP05_UF3","UF3","Introducció al disseny orientat a objectes","","active",3,"Normal",obtainModuleIdByCode("DAM_MP05"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP06","MP06","Accés a dades","","active",6,"Normal");
        first_or_create_submodule("DAM_MP06_UF1","UF1","Persistència en fitxers","","active",1,"Normal",obtainModuleIdByCode("DAM_MP06"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP06_UF2","UF2","Persistència en BDR-BDOR-BDOO","","active",2,"Normal",obtainModuleIdByCode("DAM_MP06"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP06_UF3","UF3","Persistència en BD natives XML","","active",3,"Normal",obtainModuleIdByCode("DAM_MP06"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP06_UF4","UF4","Components d'accés a dades","","active",4,"Normal",obtainModuleIdByCode("DAM_MP06"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP07","MP07","Desenvolupament d'interfícies","","active",7,"Normal");
        first_or_create_submodule("DAM_MP07_UF1","UF1","Disseny i implementació d'interfícies.","","active",1,"Normal",obtainModuleIdByCode("DAM_MP07"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP07_UF2","UF2","Preparació i distribució d'aplicacions.","","active",2,"Normal",obtainModuleIdByCode("DAM_MP07"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP08","MP08","Programació multimèdia i dispositius mòbils","","active",8,"Normal");
        first_or_create_submodule("DAM_MP08_UF1","UF1","Desenvolupament d'aplicacions per dispositius mòbils","","active",1,"Normal",obtainModuleIdByCode("DAM_MP08"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP08_UF2","UF2","Programació multimèdia","","active",2,"Normal",obtainModuleIdByCode("DAM_MP08"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP08_UF3","UF3","Desenvolupament de jocs per dispositius mòbils","","active",3,"Normal",obtainModuleIdByCode("DAM_MP08"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP09","MP09","Programació de serveis i processos","","active",9,"Normal");
        first_or_create_submodule("DAM_MP09_UF1","UF1","Seguretat i criptografia ","","active",1,"Normal",obtainModuleIdByCode("DAM_MP09"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP09_UF2","UF2","Processos i fils","","active",2,"Normal",obtainModuleIdByCode("DAM_MP09"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP09_UF3","UF3","Sòcols i serveis","","active",3,"Normal",obtainModuleIdByCode("DAM_MP09"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP10","MP10","Sistemes de gestió empresarial","","active",10,"Normal");
        first_or_create_submodule("DAM_MP10_UF1","UF1","Sistemes ERP-CRM. Implantació.","","active",1,"Normal",obtainModuleIdByCode("DAM_MP10"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_submodule("DAM_MP10_UF2","UF2","Sistemes ERP-CRM. Explotació i adequació","","active",2,"Normal",obtainModuleIdByCode("DAM_MP10"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP13","MP13","Projecte de DAM","","active",13,"Síntesi");
        first_or_create_submodule("DAM_MP13_UF1","UF1","Projecte de DAM","","active",1,"Síntesi",obtainModuleIdByCode("DAM_MP13"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DAM_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("DAM_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("DAM_MP14"), [obtainClassroomIdByCode("2DAM")]);
        first_or_create_module("DEPIM_MP01","MP01","Materials de producció gràfica","","active",1,"Normal");
        first_or_create_submodule("DEPIM_MP01_UF1","UF1","Característiques dels materials de producció gràfica","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP01"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP01_UF2","UF2","Tractaments superficials en la indústria gràfica","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP01"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP01_UF3","UF3","Aprovisionament i emmagatzematge en la indústria gràfica","","active",3,"Normal",obtainModuleIdByCode("DEPIM_MP01"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP01_UF4","UF4","Qualitat dels materials gràfics","","active",4,"Normal",obtainModuleIdByCode("DEPIM_MP01"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP02","MP02","Organització dels processos de preimpressió digital","","active",2,"Normal");
        first_or_create_submodule("DEPIM_MP02_UF1","UF1","Planificació dels processos de preimpressió","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP02"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP02_UF2","UF2","Control de qualitat en el tractament d'imatges","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP02"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP03","MP03","Disseny de productes gràfics","","active",3,"Normal");
        first_or_create_submodule("DEPIM_MP03_UF1","UF1","Briefing i documentació del projecte gràfic","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP03"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP03_UF2","UF2","Elements del projecte gràfic","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP03"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP03_UF3","UF3","Creació, desenvolupament digital i anàlisi d'esbossos","","active",3,"Normal",obtainModuleIdByCode("DEPIM_MP03"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP03_UF4","UF4","Planificació i valoració de costos del projecte gràfic","","active",4,"Normal",obtainModuleIdByCode("DEPIM_MP03"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP03_UF5","UF5","Realització de maquetes i preparació d'arts finals digitals","","active",5,"Normal",obtainModuleIdByCode("DEPIM_MP03"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP04","MP04","Gestió de la producció en processos d'edicio","","active",4,"Normal");
        first_or_create_submodule("DEPIM_MP04_UF1","UF1","Planificació de la producció en processos d'edició","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP04"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP04_UF2","UF2","Seguiment de la producció en processos d'edició","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP04"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP05","MP05","Producció editorial","","active",5,"Normal");
        first_or_create_submodule("DEPIM_MP05_UF1","UF1","Gestió i planificació editorial","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP05"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP05_UF2","UF2","Costos i pressupostos de productes editorials","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP05"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP05_UF3","UF3","Organització de continguts editorials","","active",3,"Normal",obtainModuleIdByCode("DEPIM_MP05"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP06","MP06","Disseny estructural d'envàs i embalatge","","active",6,"Normal");
        first_or_create_submodule("DEPIM_MP06_UF1","UF1","Desenvolupament del projecte","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP06"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP06_UF2","UF2","Representació i realització de maquetes","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP06"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP07","MP07","Disseny i planificació de projectes editorials multimèdia","","active",7,"Normal");
        first_or_create_submodule("DEPIM_MP07_UF1","UF1","Especificacions i arquitectura dels projectes editorials multimèdia","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP07"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP07_UF2","UF2","Planificació i estàndards de projectes editorials multimèdia","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP07"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP07_UF3","UF3","Esbossos i elements multimèdia de productes editorials","","active",3,"Normal",obtainModuleIdByCode("DEPIM_MP07"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP09","MP09","Comercialització de productes gràfics i atenció al client","","active",9,"Normal");
        first_or_create_submodule("DEPIM_MP09_UF1","UF1","Comunicació i màrqueting en l'empresa gràfica","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP09"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP09_UF2","UF2","Servei d'atenció al client en l'empresa gràfica","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP09"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP09_UF3","UF3","Gestió de vendes de productes i serveis gràfics","","active",3,"Normal",obtainModuleIdByCode("DEPIM_MP09"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP09_UF4","UF4","Gestió de reclamacions i serveis postvenda en l'empresa gràfica","","active",4,"Normal",obtainModuleIdByCode("DEPIM_MP09"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DEPIM_MP10","MP10","Formació i orientació laboral","","active",10,"Normal");
        first_or_create_submodule("DEPIM_MP10_UF1","UF1","Incorporació al treball","","active",1,"Normal",obtainModuleIdByCode("DEPIM_MP10"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_submodule("DEPIM_MP10_UF2","UF2","Prevenció de riscos laborals","","active",2,"Normal",obtainModuleIdByCode("DEPIM_MP10"), [obtainClassroomIdByCode("1DEPIM")]);
        first_or_create_module("DIE_C1","C1","Organització i gestió de l'àrea de treball assignada en la unitat/gabinet de treball","","active",1,"Normal");
        first_or_create_submodule("DIE_C1_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C1"), [obtainClassroomIdByCode("1DIE")]);
        first_or_create_module("DIE_C10","C10","Formació en centres de treball","","active",10,"FCT");
        first_or_create_submodule("DIE_C10_UD G","UD G","Unitat didàctica gobal","","active",1,"FCT",obtainModuleIdByCode("DIE_C10"), [obtainClassroomIdByCode("2DIE")]);
        first_or_create_module("DIE_C11","C11","Crèdit de síntesi","","active",11,"Síntesi");
        first_or_create_submodule("DIE_C11_UD G","UD G","Unitat didàctica gobal","","active",1,"Síntesi",obtainModuleIdByCode("DIE_C11"), [obtainClassroomIdByCode("2DIE")]);
        first_or_create_module("DIE_C2","C2","Alimentació equilibrada","","active",2,"Normal");
        first_or_create_submodule("DIE_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C2"), [obtainClassroomIdByCode("1DIE")]);
        first_or_create_module("DIE_C3","C3","Dietoteràpia","","active",3,"Normal");
        first_or_create_submodule("DIE_C3_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C3"), [obtainClassroomIdByCode("2DIE")]);
        first_or_create_module("DIE_C4","C4","Control alimentari","","active",4,"Normal");
        first_or_create_submodule("DIE_C4_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C4"), [obtainClassroomIdByCode("2DIE")]);
        first_or_create_module("DIE_C5","C5","Microbiologia i higiene alimentaria","","active",5,"Normal");
        first_or_create_submodule("DIE_C5_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C5"), [obtainClassroomIdByCode("1DIE")]);
        first_or_create_module("DIE_C6","C6","Educació sanitària i promoció de la salut","","active",6,"Normal");
        first_or_create_submodule("DIE_C6_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C6"), [obtainClassroomIdByCode("2DIE")]);
        first_or_create_module("DIE_C7","C7","Fisiopatologia adaptada a la dietètica","","active",7,"Normal");
        first_or_create_submodule("DIE_C7_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C7"), [obtainClassroomIdByCode("1DIE")]);
        first_or_create_module("DIE_C8","C8","Relacions en l'entorn de treball","","active",8,"Normal");
        first_or_create_submodule("DIE_C8_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("DIE_C8"), [obtainClassroomIdByCode("1DIE")]);
        first_or_create_module("DIE_C9","C9","Formació i orientació laboral","","active",9,"Externes");
        first_or_create_submodule("DIE_C9_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("DIE_C9"), [obtainClassroomIdByCode("2DIE")]);
        first_or_create_module("EE_MP01","MP01","Configuració d'instal·lacions solars tèrmiques","","active",1,"Normal");
        first_or_create_submodule("EE_MP01_UF1","UF1","Estudis de viabilitat d'instal·lacions","","active",1,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP01_UF2","UF2","Disseny d'instal·lacions","","active",2,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP01_UF3","UF3","Documentació d'instal·lacions","","active",3,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP01_UF4","UF4","Estudis de seguretat","","active",4,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP01","MP01","Configuració d'instal·lacions solars tèrmiques","","active",1,"Normal");
        first_or_create_submodule("EE_MP01_UF1","UF1","Estudis de viabilitat d'instal·lacions","","active",1,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP01_UF2","UF2","Disseny d'instal·lacions","","active",2,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP01_UF3","UF3","Documentació d'instal·lacions","","active",3,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP01_UF4","UF4","Estudis de seguretat","","active",4,"Normal",obtainModuleIdByCode("EE_MP01"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP02","MP02","Gestió eficient de l’aigua en edificació","","active",2,"Normal");
        first_or_create_submodule("EE_MP02_UF1","UF1","Xarxes d'aigua i sanejament als edificis","","active",1,"Normal",obtainModuleIdByCode("EE_MP02"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP02_UF2","UF2","Eficiència de les instal·lacions d'aigua als edificis","","active",2,"Normal",obtainModuleIdByCode("EE_MP02"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP02","MP02","Gestió eficient de l’aigua en edificació","","active",2,"Normal");
        first_or_create_submodule("EE_MP02_UF1","UF1","Xarxes d'aigua i sanejament als edificis","","active",1,"Normal",obtainModuleIdByCode("EE_MP02"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_submodule("EE_MP02_UF2","UF2","Eficiència de les instal·lacions d'aigua als edificis","","active",2,"Normal",obtainModuleIdByCode("EE_MP02"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP03","MP03","Representació gràfica d'instal·lacions","","active",3,"Normal");
        first_or_create_submodule("EE_MP03_UF1","UF1","Simbologia i esquemes bàsics d'instal·lacions","","active",1,"Normal",obtainModuleIdByCode("EE_MP03"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP03_UF2","UF2","Plànols d'instal·lacions amb programes de disseny","","active",2,"Normal",obtainModuleIdByCode("EE_MP03"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP03_UF3","UF3","Plànols i isometries d'instal·lacions","","active",3,"Normal",obtainModuleIdByCode("EE_MP03"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP03","MP03","Representació gràfica d'instal·lacions","","active",3,"Normal");
        first_or_create_submodule("EE_MP03_UF1","UF1","Simbologia i esquemes bàsics d'instal·lacions","","active",1,"Normal",obtainModuleIdByCode("EE_MP03"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP03_UF3","UF3","Plànols i isometries d'instal·lacions","","active",3,"Normal",obtainModuleIdByCode("EE_MP03"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP04","MP04","Promoció de l’ús eficient de l’energia i de l’aigua","","active",4,"Normal");
        first_or_create_submodule("EE_MP04_UF1","UF1","Tècniques de màrqueting","","active",1,"Normal",obtainModuleIdByCode("EE_MP04"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP04_UF2","UF2","Accions divulgatives sobre l'ús de l'energia i l'aigua","","active",2,"Normal",obtainModuleIdByCode("EE_MP04"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP04","MP04","Promoció de l’ús eficient de l’energia i de l’aigua","","active",4,"Normal");
        first_or_create_submodule("EE_MP04_UF1","UF1","Tècniques de màrqueting","","active",1,"Normal",obtainModuleIdByCode("EE_MP04"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_submodule("EE_MP04_UF2","UF2","Accions divulgatives sobre l'ús de l'energia i l'aigua","","active",2,"Normal",obtainModuleIdByCode("EE_MP04"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP05","MP05","Certificació energètica d’edificis","","active",5,"Normal");
        first_or_create_submodule("EE_MP05_UF1","UF1","Demanda energètica d'edificis","","active",1,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP05_UF2","UF2","Qualificació i certificació energètica d'edificis","","active",2,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP05","MP05","Certificació energètica d’edificis","","active",5,"Normal");
        first_or_create_submodule("EE_MP05_UF1","UF1","Demanda energètica d'edificis","","active",1,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP05_UF2","UF2","Qualificació i certificació energètica d'edificis","","active",2,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP05","MP05","Certificació energètica d’edificis","","active",5,"Normal");
        first_or_create_submodule("EE_MP05_UF1","UF1","Demanda energètica d'edificis","","active",1,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP05_UF2","UF2","Qualificació i certificació energètica d'edificis","","active",2,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP05","MP05","Certificació energètica d’edificis","","active",5,"Normal");
        first_or_create_submodule("EE_MP05_UF1","UF1","Demanda energètica d'edificis","","active",1,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_submodule("EE_MP05_UF2","UF2","Qualificació i certificació energètica d'edificis","","active",2,"Normal",obtainModuleIdByCode("EE_MP05"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP06","MP06","Eficiència energètica d’instal·lacions","","active",6,"Normal");
        first_or_create_submodule("EE_MP06_UF1","UF1","Eficiència energètica","","active",1,"Normal",obtainModuleIdByCode("EE_MP06"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP06_UF2","UF2","Estalvi energètic i millora de l'eficiència energètica","","active",2,"Normal",obtainModuleIdByCode("EE_MP06"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP06_UF3","UF3","Eficiència energètica de les instal·lacions d'il·luminació en edificis","","active",3,"Normal",obtainModuleIdByCode("EE_MP06"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP06","MP06","Eficiència energètica d’instal·lacions","","active",6,"Normal");
        first_or_create_submodule("EE_MP06_UF1","UF1","Eficiència energètica","","active",1,"Normal",obtainModuleIdByCode("EE_MP06"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_submodule("EE_MP06_UF2","UF2","Estalvi energètic i millora de l'eficiència energètica","","active",2,"Normal",obtainModuleIdByCode("EE_MP06"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_submodule("EE_MP06_UF3","UF3","Eficiència energètica de les instal·lacions d'il·luminació en edificis","","active",3,"Normal",obtainModuleIdByCode("EE_MP06"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP07","MP07","Gestió del muntatge i manteniment d'instal·lacions solars tèrmiques","","active",7,"Normal");
        first_or_create_submodule("EE_MP07_UF1","UF1","Planificació del muntatge d'instal·lacions","","active",1,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP07_UF2","UF2","Posada en servei d'instal·lacions","","active",2,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP07_UF3","UF3","Planificació del manteniment d'instal·lacions","","active",3,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP07_UF4","UF4","Anglès Tècnic","","active",4,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP07","MP07","Gestió del muntatge i manteniment d'instal·lacions solars tèrmiques","","active",7,"Normal");
        first_or_create_submodule("EE_MP07_UF1","UF1","Planificació del muntatge d'instal·lacions","","active",1,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP07_UF2","UF2","Posada en servei d'instal·lacions","","active",2,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP07_UF3","UF3","Planificació del manteniment d'instal·lacions","","active",3,"Normal",obtainModuleIdByCode("EE_MP07"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP08","MP08","Processos de muntatge d'instal·lacions","","active",8,"Normal");
        first_or_create_submodule("EE_MP08_UF1","UF1","Tècniques de mecanització i unió","","active",1,"Normal",obtainModuleIdByCode("EE_MP08"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP08_UF2","UF2","Muntatge i funcionament d'instal·lacions bàsiques de fred i climatització","","active",2,"Normal",obtainModuleIdByCode("EE_MP08"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP08_UF3","UF3","Muntatge i funcionament d'instal·lacions bàsiques de calefacció","","active",3,"Normal",obtainModuleIdByCode("EE_MP08"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP08","MP08","Processos de muntatge d'instal·lacions","","active",8,"Normal");
        first_or_create_submodule("EE_MP08_UF1","UF1","Tècniques de mecanització i unió","","active",1,"Normal",obtainModuleIdByCode("EE_MP08"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP08_UF2","UF2","Muntatge i funcionament d'instal·lacions bàsiques de fred i climatització","","active",2,"Normal",obtainModuleIdByCode("EE_MP08"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP08_UF3","UF3","Muntatge i funcionament d'instal·lacions bàsiques de calefacció","","active",3,"Normal",obtainModuleIdByCode("EE_MP08"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP09","MP09","Equips i instal·lacions tèrmiques","","active",9,"Normal");
        first_or_create_submodule("EE_MP09_UF1","UF1","Balanç energètic d'instal·lacions tèrmiques: calefacció, climatització i refrigeració","","active",1,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP09_UF2","UF2","Equips i instal·lacions de canalitzacions","","active",2,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP09_UF3","UF3","Equips i instal·lacions de climatització i ventilació","","active",3,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP09_UF4","UF4","Equips i instal·lacions frigorífiques","","active",4,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP09_UF5","UF5","Equips i instal·lacions de calefacció","","active",5,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP09_UF6","UF6","Equips i instal·lacions contra incendis","","active",6,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP09","MP09","Equips i instal·lacions tèrmiques","","active",9,"Normal");
        first_or_create_submodule("EE_MP09_UF1","UF1","Balanç energètic d'instal·lacions tèrmiques: calefacció, climatització i refrigeració","","active",1,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP09_UF6","UF6","Equips i instal·lacions contra incendis","","active",6,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP09","MP09","Equips i instal·lacions tèrmiques","","active",9,"Normal");
        first_or_create_submodule("EE_MP09_UF1","UF1","Balanç energètic d'instal·lacions tèrmiques: calefacció, climatització i refrigeració","","active",1,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP09_UF6","UF6","Equips i instal·lacions contra incendis","","active",6,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP09","MP09","Equips i instal·lacions tèrmiques","","active",9,"Normal");
        first_or_create_submodule("EE_MP09_UF1","UF1","Balanç energètic d'instal·lacions tèrmiques: calefacció, climatització i refrigeració","","active",1,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_submodule("EE_MP09_UF6","UF6","Equips i instal·lacions contra incendis","","active",6,"Normal",obtainModuleIdByCode("EE_MP09"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP10","MP10","Formació i orientació laboral","","active",10,"Externes");
        first_or_create_submodule("EE_MP10_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("EE_MP10"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_submodule("EE_MP10_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("EE_MP10"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP10","MP10","Formació i orientació laboral","","active",10,"Externes");
        first_or_create_submodule("EE_MP10_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("EE_MP10"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP10_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("EE_MP10"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP11","MP11","Empresa i Iniciativa Emprenedora","","active",11,"Externes");
        first_or_create_submodule("EE_MP11_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("EE_MP11"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP11","MP11","Empresa i Iniciativa Emprenedora","","active",11,"Externes");
        first_or_create_submodule("EE_MP11_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("EE_MP11"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP12","MP12","Projecte d'eficiència energètica i energia solar tèrmica","","active",12,"Síntesi");
        first_or_create_submodule("EE_MP12_UF1","UF1","Projecte d'eficiència energètica i energia solar tèrmica","","active",1,"Síntesi",obtainModuleIdByCode("EE_MP12"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP12","MP12","Projecte d'eficiència energètica i energia solar tèrmica","","active",12,"Síntesi");
        first_or_create_submodule("EE_MP12_UF1","UF1","Projecte d'eficiència energètica i energia solar tèrmica","","active",1,"Síntesi",obtainModuleIdByCode("EE_MP12"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP13","MP13","Formació en centres de treball","","active",13,"FCT");
        first_or_create_submodule("EE_MP13_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("EE_MP13"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_submodule("EE_MP13_UF1","UF1","Formació en centres de treball","","active",7,"FCT",obtainModuleIdByCode("EE_MP13"), [obtainClassroomIdByCode("1EE/ 2EE")]);
        first_or_create_module("EE_MP13","MP13","Formació en centres de treball","","active",13,"FCT");
        first_or_create_submodule("EE_MP13_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("EE_MP13"), [obtainClassroomIdByCode("2EE")]);
        first_or_create_module("EE_MP14","MP14","Instal·lacions automatizades en els edificis","","active",14,"Normal");
        first_or_create_submodule("EE_MP14_UF1","UF1","Principis de l'electricitat i l'automatització","","active",1,"Normal",obtainModuleIdByCode("EE_MP14"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EE_MP14","MP14","Instal·lacions automatizades en els edificis","","active",14,"Normal");
        first_or_create_submodule("EE_MP14_UF1","UF1","Principis de l'electricitat i l'automatització","","active",1,"Normal",obtainModuleIdByCode("EE_MP14"), [obtainClassroomIdByCode("1EE")]);
        first_or_create_module("EIN_MP01","MP01","Intervenció en famílies i atenció a menors en risc social","","active",1,"Normal");
        first_or_create_submodule("EIN_MP01_UF1","UF1","Intervenció educativa amb infants en risc social","","active",1,"Normal",obtainModuleIdByCode("EIN_MP01"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP01_UF2","UF2","Intervenció educativa amb famílies","","active",2,"Normal",obtainModuleIdByCode("EIN_MP01"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP02","MP02","Didàctica de l'educació infantil","","active",2,"Normal");
        first_or_create_submodule("EIN_MP02_UF1","UF1","Contextualització de la intervenció educativa en infants de 0 a 6 anys","","active",1,"Normal",obtainModuleIdByCode("EIN_MP02"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP02_UF2","UF2","Planificació d'espais, el temps i els recursos en educació infantil","","active",2,"Normal",obtainModuleIdByCode("EIN_MP02"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP02_UF3","UF3","Disseny de projectes i d'activitats educatives en l'àmbit formal","","active",3,"Normal",obtainModuleIdByCode("EIN_MP02"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP02_UF4","UF4","Disseny de projectes i d'activitats educatives en l'àmbit no formal","","active",4,"Normal",obtainModuleIdByCode("EIN_MP02"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_module("EIN_MP03","MP03","Autonomia personal i salut infantil","","active",3,"Normal");
        first_or_create_submodule("EIN_MP03_UF1","UF1","Atenció i cura de l'alimentació dels infants","","active",1,"Normal",obtainModuleIdByCode("EIN_MP03"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP03_UF2","UF2","Atenció i cura de l'activitat i el descans dels infants","","active",2,"Normal",obtainModuleIdByCode("EIN_MP03"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP03_UF3","UF3","Atenció i cura de la higiene dels infants","","active",3,"Normal",obtainModuleIdByCode("EIN_MP03"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP03_UF4","UF4","Programació dels hàbits d'autonomia personal","","active",4,"Normal",obtainModuleIdByCode("EIN_MP03"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP03_UF5","UF5","Intervenció en situacions de salut d'especial dificultat","","active",5,"Normal",obtainModuleIdByCode("EIN_MP03"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_module("EIN_MP04","MP04","El joc i la seva metodologia","","active",4,"Normal");
        first_or_create_submodule("EIN_MP04_UF1","UF1","El joc i les joguines","","active",1,"Normal",obtainModuleIdByCode("EIN_MP04"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP04_UF2","UF2","Disseny de projectes d'intervenció d'oci i de lleure educatiu","","active",2,"Normal",obtainModuleIdByCode("EIN_MP04"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP04_UF3","UF3","Implementació d'activitats d'oci de lleure","","active",3,"Normal",obtainModuleIdByCode("EIN_MP04"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP05","MP05","Expressió i comunicació","","active",5,"Normal");
        first_or_create_submodule("EIN_MP05_UF1","UF1","Intervenció en el desenvolupament de la comunicació i l'expressió verbal","","active",1,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP05_UF2","UF2","Intervenció en el desenvolupament de la comunicació i l'expressió ritmicomusical","","active",2,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP05_UF3","UF3","Intervenció en el desenvolupament de la comunicació i l'expressió logicomatemàtica","","active",3,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP05_UF4","UF4","Intervenció en el desenvolupament de la comunicació i l'expressió gestual","","active",4,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP05_UF5","UF5","Marató de contes","","active",5,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP05_UF6","UF6","Intervenció en el desenvolupament de la comunicació i l'expressió a través de les TAC","","active",6,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP05_UF7","UF7","Intervenció en el desenvolupament de la comunicació i l'expressió plàstica","","active",7,"Normal",obtainModuleIdByCode("EIN_MP05"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_module("EIN_MP06","MP06","Desenvolupament cognitiu i motriu","","active",6,"Normal");
        first_or_create_submodule("EIN_MP06_UF1","UF1","Intervenció en el desenvolupament sensoperceptiu","","active",1,"Normal",obtainModuleIdByCode("EIN_MP06"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP06_UF2","UF2","Intervenció en el desenvolupament motriu","","active",2,"Normal",obtainModuleIdByCode("EIN_MP06"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP06_UF3","UF3","Intervenció en el desenvolupament cognitiu","","active",3,"Normal",obtainModuleIdByCode("EIN_MP06"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP06_UF4","UF4","Intervenció primerenca","","active",4,"Normal",obtainModuleIdByCode("EIN_MP06"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP06_UF5","UF5","Pràctica psicomotriu","","active",5,"Normal",obtainModuleIdByCode("EIN_MP06"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_module("EIN_MP07","MP07","Desenvolupament socioafectiu","","active",7,"Normal");
        first_or_create_submodule("EIN_MP07_UF1","UF1","Intervenció en l'àmbit afectivosexual","","active",1,"Normal",obtainModuleIdByCode("EIN_MP07"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_submodule("EIN_MP07_UF2","UF2","Intervenció en l'àmbit social","","active",2,"Normal",obtainModuleIdByCode("EIN_MP07"), [obtainClassroomIdByCode("1EIN")]);
        first_or_create_module("EIN_MP08","MP08","Habilitats socials","","active",8,"Normal");
        first_or_create_submodule("EIN_MP08_UF1","UF1","Habilitats de comunicació","","active",1,"Normal",obtainModuleIdByCode("EIN_MP08"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP08_UF2","UF2","Dinamització de grups","","active",2,"Normal",obtainModuleIdByCode("EIN_MP08"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP09","MP09","Primers auxilis","","active",9,"Normal");
        first_or_create_submodule("EIN_MP09_UF1","UF1","Recursos i trasllat d'accidentats","","active",1,"Normal",obtainModuleIdByCode("EIN_MP09"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP09_UF2","UF2","Suport vital bàsic (SVB) i ús de desfibril·ladors","","active",2,"Normal",obtainModuleIdByCode("EIN_MP09"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP09_UF3","UF3","Atenció sanitària d'urgència","","active",3,"Normal",obtainModuleIdByCode("EIN_MP09"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP10","MP10","Formació i orientació laboral","","active",10,"Externes");
        first_or_create_submodule("EIN_MP10_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("EIN_MP10"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_submodule("EIN_MP10_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("EIN_MP10"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP11","MP11","Empresa i iniciativa emprenedora","","active",11,"Externes");
        first_or_create_submodule("EIN_MP11_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("EIN_MP11"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_submodule("EIN_MP11_UF1","UF1","Empresa a l'aula","","active",1,"Externes",obtainModuleIdByCode("EIN_MP11"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP12","MP12","Projecte d'atenció a la infantesa","","active",12,"Síntesi");
        first_or_create_submodule("EIN_MP12_UF1","UF1","Projecte d'atenció a la infantesa","","active",1,"Síntesi",obtainModuleIdByCode("EIN_MP12"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("EIN_MP13","MP13","Formació en centres de treball","","active",13,"FCT");
        first_or_create_submodule("EIN_MP13_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("EIN_MP13"), [obtainClassroomIdByCode("2EIN")]);
        first_or_create_module("ES_MP01","MP01","Manteniment mecànic preventiu del vehicle","","active",1,"Normal");
        first_or_create_submodule("ES_MP01_UF1","UF1","Funcionament electromecànic del vehicle","","active",1,"Normal",obtainModuleIdByCode("ES_MP01"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP01_UF2","UF2","Manteniment i reparacions simples","","active",2,"Normal",obtainModuleIdByCode("ES_MP01"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP02","MP02","Logística sanitària en emergències","","active",2,"Normal");
        first_or_create_submodule("ES_MP02_UF1","UF1","Desplegament en emergències","","active",1,"Normal",obtainModuleIdByCode("ES_MP02"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP02_UF2","UF2","Materials, subministraments i comunicacions","","active",2,"Normal",obtainModuleIdByCode("ES_MP02"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP02_UF3","UF3","Coordinació d'evacuació","","active",3,"Normal",obtainModuleIdByCode("ES_MP02"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("ES_MP03","MP03","Dotació sanitària","","active",3,"Normal");
        first_or_create_submodule("ES_MP03_UF1","UF1","Manteniment de la dotació sanitària","","active",1,"Normal",obtainModuleIdByCode("ES_MP03"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP03_UF2","UF2","Condicionament de la dotació sanitària","","active",2,"Normal",obtainModuleIdByCode("ES_MP03"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP03_UF3","UF3","Control del material","","active",3,"Normal",obtainModuleIdByCode("ES_MP03"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP03_UF4","UF4","Control de la documentació","","active",4,"Normal",obtainModuleIdByCode("ES_MP03"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP04","MP04","Assistència sanitària inicial en situacions d'emergència","","active",4,"Normal");
        first_or_create_submodule("ES_MP04_UF1","UF1","Atenció sanitària immediata","","active",1,"Normal",obtainModuleIdByCode("ES_MP04"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP04_UF2","UF2","Atenció a múltiples víctimes","","active",2,"Normal",obtainModuleIdByCode("ES_MP04"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP05","MP05","Atenció sanitària especial en situacions d'emergència","","active",5,"Normal");
        first_or_create_submodule("ES_MP05_UF1","UF1","Material i medicació","","active",1,"Normal",obtainModuleIdByCode("ES_MP05"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP05_UF2","UF2","Lesions per agents físiscs","","active",2,"Normal",obtainModuleIdByCode("ES_MP05"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP05_UF3","UF3","Lesions per agents químics i biològics","","active",3,"Normal",obtainModuleIdByCode("ES_MP05"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP05_UF4","UF4","Patologia orgànica d'urgència","","active",4,"Normal",obtainModuleIdByCode("ES_MP05"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP05_UF5","UF5","Patologia neurològica i psiquiàtrica d'urgència","","active",5,"Normal",obtainModuleIdByCode("ES_MP05"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_submodule("ES_MP05_UF6","UF6","Atenció al part imminent","","active",6,"Normal",obtainModuleIdByCode("ES_MP05"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("ES_MP06","MP06","Evacuació i trasllat","","active",6,"Normal");
        first_or_create_submodule("ES_MP06_UF1","UF1","Condicionaments d'espais d'intervenció","","active",1,"Normal",obtainModuleIdByCode("ES_MP06"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP06_UF2","UF2","Mobilització","","active",2,"Normal",obtainModuleIdByCode("ES_MP06"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP06_UF3","UF3","Immobilització","","active",3,"Normal",obtainModuleIdByCode("ES_MP06"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP06_UF4","UF4","Conducció i transferència","","active",4,"Normal",obtainModuleIdByCode("ES_MP06"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP07","MP07","Suport psicològic en situacions d'emergència","","active",7,"Normal");
        first_or_create_submodule("ES_MP07_UF1","UF1","Suport psicològic en situacions d'emergències","","active",1,"Normal",obtainModuleIdByCode("ES_MP07"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("ES_MP08","MP08","Plans d'emergència i dispositius de risc previsibles","","active",8,"Normal");
        first_or_create_submodule("ES_MP08_UF1","UF1","Plans d'emergència","","active",1,"Normal",obtainModuleIdByCode("ES_MP08"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP08_UF2","UF2","Dispositius de risc previsibles","","active",2,"Normal",obtainModuleIdByCode("ES_MP08"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP09","MP09","Teleemergències","","active",9,"Normal");
        first_or_create_submodule("ES_MP09_UF1","UF1","Centres coordinadors","","active",1,"Normal",obtainModuleIdByCode("ES_MP09"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP09_UF2","UF2","Recepció i valoració de la demanda","","active",2,"Normal",obtainModuleIdByCode("ES_MP09"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP10","MP10","Anatomofisiologia i patologia bàsiques","","active",10,"Normal");
        first_or_create_submodule("ES_MP10_UF1","UF1","L'organització del cos humà","","active",1,"Normal",obtainModuleIdByCode("ES_MP10"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP10_UF2","UF2","La salut i la malaltia","","active",2,"Normal",obtainModuleIdByCode("ES_MP10"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP10_UF3","UF3","El moviment i la percepció","","active",3,"Normal",obtainModuleIdByCode("ES_MP10"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP10_UF4","UF4","L'oxigenació i la distribució de la sang","","active",4,"Normal",obtainModuleIdByCode("ES_MP10"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP10_UF5","UF5","El metabolisme i l'excreció","","active",5,"Normal",obtainModuleIdByCode("ES_MP10"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP10_UF6","UF6","La regulació interna i la seva relació amb l'exterior","","active",6,"Normal",obtainModuleIdByCode("ES_MP10"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("ES_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("ES_MP11"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_submodule("ES_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("ES_MP11"), [obtainClassroomIdByCode("1ES")]);
        first_or_create_module("ES_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("ES_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("ES_MP12"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("ES_MP13","MP13","Anglès","","active",13,"Externes");
        first_or_create_submodule("ES_MP13_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("ES_MP13"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("ES_MP14","MP14","Projecte de síntesi","","active",14,"Síntesi");
        first_or_create_submodule("ES_MP14_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("ES_MP14"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("ES_MP15","MP15","Formació en centres de treball","","active",15,"FCT");
        first_or_create_submodule("ES_MP15_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("ES_MP15"), [obtainClassroomIdByCode("2ES")]);
        first_or_create_module("FAR_MP01","MP01","Oficina de farmàcia","","active",1,"Normal");
        first_or_create_submodule("FAR_MP01_UF1","UF1","Organització farmacèutica","","active",1,"Normal",obtainModuleIdByCode("FAR_MP01"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP01_UF2","UF2","Control d'existències","","active",2,"Normal",obtainModuleIdByCode("FAR_MP01"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP01_UF3","UF3","Documents de compravenda","","active",3,"Normal",obtainModuleIdByCode("FAR_MP01"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP01_UF4","UF4","Documents de dispensació","","active",4,"Normal",obtainModuleIdByCode("FAR_MP01"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_module("FAR_MP02","MP02","Dispensació de productes farmacèutics","","active",2,"Normal");
        first_or_create_submodule("FAR_MP02_UF1","UF1","Protocols de dispensació","","active",1,"Normal",obtainModuleIdByCode("FAR_MP02"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP02_UF2","UF2","Farmacologia","","active",2,"Normal",obtainModuleIdByCode("FAR_MP02"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP02_UF3","UF3","Terapèutica","","active",3,"Normal",obtainModuleIdByCode("FAR_MP02"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP02_UF4","UF4","Dispensació hospitalària","","active",4,"Normal",obtainModuleIdByCode("FAR_MP02"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_module("FAR_MP02","MP02","Dispensació de productes farmacèutics","","active",2,"Normal");
        first_or_create_submodule("FAR_MP02_UF5","UF5","Homeopatia","","active",5,"Normal",obtainModuleIdByCode("FAR_MP02"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP02_UF6","UF6","Fitoteràpia","","active",6,"Normal",obtainModuleIdByCode("FAR_MP02"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP03","MP03","Disponibilitat de productes parafarmacèutics","","active",3,"Normal");
        first_or_create_submodule("FAR_MP03_UF1","UF1","Parafarmàcia","","active",1,"Normal",obtainModuleIdByCode("FAR_MP03"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP03_UF2","UF2","Dermofarmàcia","","active",2,"Normal",obtainModuleIdByCode("FAR_MP03"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP03_UF3","UF3","Dietètica","","active",3,"Normal",obtainModuleIdByCode("FAR_MP03"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP03_UF4","UF4","Biocides","","active",4,"Normal",obtainModuleIdByCode("FAR_MP03"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP03_UF5","UF5","Productes sanitaris","","active",5,"Normal",obtainModuleIdByCode("FAR_MP03"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP03_UF6","UF6","Ortopèdia i pròtesis","","active",6,"Normal",obtainModuleIdByCode("FAR_MP03"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_module("FAR_MP04","MP04","Formulació magistral","","active",4,"Normal");
        first_or_create_submodule("FAR_MP04_UF1","UF1","Normes de correcta elaboració","","active",1,"Normal",obtainModuleIdByCode("FAR_MP04"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP04_UF2","UF2","Elaboració de fòrmules","","active",2,"Normal",obtainModuleIdByCode("FAR_MP04"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP05","MP05","Promoció de la salut","","active",5,"Normal");
        first_or_create_submodule("FAR_MP05_UF1","UF1","Educació per a la salut","","active",1,"Normal",obtainModuleIdByCode("FAR_MP05"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP05_UF2","UF2","Controls analítics","","active",2,"Normal",obtainModuleIdByCode("FAR_MP05"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP05_UF3","UF3","Comunicació amb l'usuari i col·laboració en el consell farmacèutic","","active",3,"Normal",obtainModuleIdByCode("FAR_MP05"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP06","MP06","Disposició i venda de productes","","active",6,"Normal");
        first_or_create_submodule("FAR_MP06_UF1","UF1","Atenció a l'usuari","","active",1,"Normal",obtainModuleIdByCode("FAR_MP06"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP06_UF2","UF2","Organització i venda de productes","","active",2,"Normal",obtainModuleIdByCode("FAR_MP06"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP07","MP07","Operacions bàsiques de laboratori","","active",7,"Normal");
        first_or_create_submodule("FAR_MP07_UF1","UF1","Material i instruments de laboratori","","active",1,"Normal",obtainModuleIdByCode("FAR_MP07"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP07_UF2","UF2","Preparació de dissolucions","","active",2,"Normal",obtainModuleIdByCode("FAR_MP07"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP07_UF3","UF3","Separació de mescles de substàncies","","active",3,"Normal",obtainModuleIdByCode("FAR_MP07"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP07_UF4","UF4","Identificació de substàncies","","active",4,"Normal",obtainModuleIdByCode("FAR_MP07"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP07_UF5","UF5","Presa de mostres","","active",5,"Normal",obtainModuleIdByCode("FAR_MP07"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_module("FAR_MP08","MP08","Primers auxilis","","active",8,"Normal");
        first_or_create_submodule("FAR_MP08_UF1","UF1","Recursos i trasllat d'accidentats","","active",1,"Normal",obtainModuleIdByCode("FAR_MP08"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP08_UF2","UF2","Suport vital bàsic (SVB) i ús dels desfibril·ladors","","active",2,"Normal",obtainModuleIdByCode("FAR_MP08"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_submodule("FAR_MP08_UF3","UF3","Atenció sanitària d'urgència","","active",3,"Normal",obtainModuleIdByCode("FAR_MP08"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP09","MP09","Anatomofisiologia i patologia bàsiques","","active",9,"Normal");
        first_or_create_submodule("FAR_MP09_UF1","UF1","L'organització del cos humà","","active",1,"Normal",obtainModuleIdByCode("FAR_MP09"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP09_UF2","UF2","La salut i la malaltia","","active",2,"Normal",obtainModuleIdByCode("FAR_MP09"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP09_UF3","UF3","El moviment i la percepció","","active",3,"Normal",obtainModuleIdByCode("FAR_MP09"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP09_UF4","UF4","L'oxigenació i la distribució de la sang","","active",4,"Normal",obtainModuleIdByCode("FAR_MP09"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP09_UF5","UF5","El metabolisme i l'excreció","","active",5,"Normal",obtainModuleIdByCode("FAR_MP09"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_submodule("FAR_MP09_UF6","UF6","La regulació interna i la seva relació amb l'exterior","","active",6,"Normal",obtainModuleIdByCode("FAR_MP09"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_module("FAR_MP10","MP10","Formació i orientació laboral","","active",10,"Externes");
        first_or_create_submodule("FAR_MP10_UF1","UF1","Prevenció de riscos laborals","","active",1,"Externes",obtainModuleIdByCode("FAR_MP10"), [obtainClassroomIdByCode("1FAR")]);
        first_or_create_module("FAR_MP10","MP10","Formació i orientació laboral","","active",10,"Externes");
        first_or_create_submodule("FAR_MP10_UF1","UF1","Incorporació al treball","","active",2,"Externes",obtainModuleIdByCode("FAR_MP10"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP11","MP11","Empresa i iniciativa emprenedora","","active",11,"Externes");
        first_or_create_submodule("FAR_MP11_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("FAR_MP11"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP12","MP12","Anglès","","active",12,"Externes");
        first_or_create_submodule("FAR_MP12_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("FAR_MP12"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP13","MP13","Projecte de farmàcia i parafarmàcia","","active",13,"Síntesi");
        first_or_create_submodule("FAR_MP13_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("FAR_MP13"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("FAR_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("FAR_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("FAR_MP14"), [obtainClassroomIdByCode("2FAR")]);
        first_or_create_module("GAD_MP01","MP01","Comunicació  i atenció al client","","active",1,"Normal");
        first_or_create_module("GAD_MP01","MP01","Comunicació empresarial i atenció al client","","active",1,"Normal");
        first_or_create_submodule("GAD_MP01_UF1","UF1","Comunicació empresarial oral","","active",1,"Normal",obtainModuleIdByCode("GAD_MP01"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP01_UF2","UF2","Comunicació empresarial escrita","","active",2,"Normal",obtainModuleIdByCode("GAD_MP01"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP01_UF3","UF3","Sistemes d'arxiu","","active",3,"Normal",obtainModuleIdByCode("GAD_MP01"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP01_UF4","UF4","Atenció al client/usuari","","active",4,"Normal",obtainModuleIdByCode("GAD_MP01"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GAD_MP02","MP02","Operacions de compravenda","","active",2,"Normal");
        first_or_create_submodule("GAD_MP02_UF1","UF1","Circuit administratiu de la compravenda","","active",1,"Normal",obtainModuleIdByCode("GAD_MP02"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP02_UF2","UF2","Gestió d'estocs","","active",2,"Normal",obtainModuleIdByCode("GAD_MP02"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP02_UF3","UF3","Declaracions fiscals","","active",3,"Normal",obtainModuleIdByCode("GAD_MP02"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_module("GAD_MP03","MP03","Operacions de recursos humans","","active",3,"Normal");
        first_or_create_submodule("GAD_MP03_UF1","UF1","Selecció i formació","","active",1,"Normal",obtainModuleIdByCode("GAD_MP03"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP03_UF2","UF2","Contractació i retribució","","active",2,"Normal",obtainModuleIdByCode("GAD_MP03"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP03_UF3","UF3","Processos de l'activitat laboral","","active",3,"Normal",obtainModuleIdByCode("GAD_MP03"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_module("GAD_MP04","MP04","Operacions de gestió de tresoreria","","active",4,"Normal");
        first_or_create_submodule("GAD_MP04_UF1","UF1","Control de tresoreria","","active",1,"Normal",obtainModuleIdByCode("GAD_MP04"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP04_UF2","UF2","Instruments financers i d'assegurances","","active",2,"Normal",obtainModuleIdByCode("GAD_MP04"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP04_UF3","UF3","Operacions financeres bàsiques","","active",3,"Normal",obtainModuleIdByCode("GAD_MP04"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_module("GAD_MP05","MP05","Tècnica comptable","","active",5,"Normal");
        first_or_create_submodule("GAD_MP05_UF1","UF1","Patrimoni i metodologia comptable","","active",1,"Normal",obtainModuleIdByCode("GAD_MP05"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP05_UF2","UF2","Cicle comptable bàsic","","active",2,"Normal",obtainModuleIdByCode("GAD_MP05"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_submodule("GAD_MP05_UF3","UF3","Cicle comptable mitjà","","active",3,"Normal",obtainModuleIdByCode("GAD_MP05"), [obtainClassroomIdByCode("1GAD")]);
        first_or_create_module("GAD_MP06","MP06","Tractament de la documentació comptable","","active",6,"Normal");
        first_or_create_submodule("GAD_MP06_UF1","UF1","Preparació i codificació comptable","","active",1,"Normal",obtainModuleIdByCode("GAD_MP06"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP06_UF2","UF2","Registre comptable","","active",2,"Normal",obtainModuleIdByCode("GAD_MP06"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP06_UF3","UF3","Comptes anuals bàsics","","active",3,"Normal",obtainModuleIdByCode("GAD_MP06"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP06_UF4","UF4","Verificació i control intern","","active",4,"Normal",obtainModuleIdByCode("GAD_MP06"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GAD_MP07","MP07","Tractament informàtic","","active",7,"Normal");
        first_or_create_submodule("GAD_MP07_UF1","UF1","Tecnologia i comunicacions digitals","","active",1,"Normal",obtainModuleIdByCode("GAD_MP07"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_submodule("GAD_MP07_UF2","UF2","Ordinagrafia i gravació de dades","","active",2,"Normal",obtainModuleIdByCode("GAD_MP07"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_submodule("GAD_MP07_UF3","UF3","Tractament de la informació escrita i numèrica","","active",3,"Normal",obtainModuleIdByCode("GAD_MP07"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_submodule("GAD_MP07_UF4","UF4","Tractament de dades i integració d'aplicacions","","active",4,"Normal",obtainModuleIdByCode("GAD_MP07"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_submodule("GAD_MP07_UF5","UF5","Presentacions multimèdia de continguts","","active",5,"Normal",obtainModuleIdByCode("GAD_MP07"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_submodule("GAD_MP07_UF6","UF6","Eines d'internet per a l'empresa","","active",6,"Normal",obtainModuleIdByCode("GAD_MP07"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_module("GAD_MP08","MP08","Operacions administratives de suport","","active",8,"Normal");
        first_or_create_submodule("GAD_MP08_UF1","UF1","Selecció i tractament de la informació","","active",1,"Normal",obtainModuleIdByCode("GAD_MP08"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP08_UF2","UF2","Operacions logístiques de suport administratiu","","active",2,"Normal",obtainModuleIdByCode("GAD_MP08"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GAD_MP09","MP09","Anglès","","active",9,"Externes");
        first_or_create_submodule("GAD_MP09_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("GAD_MP09"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GAD_MP10","MP10","Empresa i administració","","active",10,"Normal");
        first_or_create_submodule("GAD_MP10_UF1","UF1","Innovació i emprenedoria","","active",1,"Normal",obtainModuleIdByCode("GAD_MP10"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP10_UF2","UF2","Empresa i activitat econòmica","","active",2,"Normal",obtainModuleIdByCode("GAD_MP10"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP10_UF3","UF3","Administracions públiques","","active",3,"Normal",obtainModuleIdByCode("GAD_MP10"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_submodule("GAD_MP10_UF4","UF4","Fiscalitat empresarial bàsica","","active",4,"Normal",obtainModuleIdByCode("GAD_MP10"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GAD_MP11","MP11","Empresa a l'aula","","active",11,"Normal");
        first_or_create_submodule("GAD_MP11_UF1","UF1","Empresa a l'aula","","active",1,"Normal",obtainModuleIdByCode("GAD_MP11"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GAD_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("GAD_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("GAD_MP12"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_submodule("GAD_MP12_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("GAD_MP12"), [obtainClassroomIdByCode("1GAD"), obtainClassroomIdByCode("1GAD A"), obtainClassroomIdByCode("1GAD B")]);
        first_or_create_module("GAD_MP13","MP13","Formació en centres de treball","","active",13,"Normal");
        first_or_create_submodule("GAD_MP13_UF1","UF1","Formació en centres de treball","","active",1,"Normal",obtainModuleIdByCode("GAD_MP13"), [obtainClassroomIdByCode("2GAD")]);
        first_or_create_module("GCM_C1","C1","Investigació comercial","","active",1,"Normal");
        first_or_create_submodule("GCM_C1_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C1"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C10","C10","Formació en centres de treball","","active",9,"FCT");
        first_or_create_submodule("GCM_C10_UD G","UD G","Unitat didàctica gobal","","active",1,"FCT",obtainModuleIdByCode("GCM_C10"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C11","C11","Projecte de síntesi","","active",9,"Síntesi");
        first_or_create_submodule("GCM_C11_UD G","UD G","Unitat didàctica gobal","","active",1,"Síntesi",obtainModuleIdByCode("GCM_C11"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C2","C2","Polítiques de màrqueting","","active",2,"Normal");
        first_or_create_submodule("GCM_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C2"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C3","C3","Logística comercial","","active",3,"Normal");
        first_or_create_submodule("GCM_C3_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C3"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C4","C4","El marxandatge","","active",4,"Normal");
        first_or_create_submodule("GCM_C4_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C4"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C5","C5","Promoció del punt de venda","","active",5,"Normal");
        first_or_create_submodule("GCM_C5_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C5"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C6","C6","Gestió de compravenda","","active",6,"Normal");
        first_or_create_submodule("GCM_C6_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C6"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C7","C7","Aplicacions informàtiques de propòsit general","","active",7,"Normal");
        first_or_create_submodule("GCM_C7_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("GCM_C7"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C8","C8","Llengua estrangera (Anglès)","","active",8,"Externes");
        first_or_create_submodule("GCM_C8_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("GCM_C8"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("GCM_C9","C9","Formació i orientació laboral","","active",9,"Externes");
        first_or_create_submodule("GCM_C9_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("GCM_C9"), [obtainClassroomIdByCode("GCM")]);
        first_or_create_module("IEA_MP01","MP01","Automatismes industrials","","active",1,"Normal");
        first_or_create_submodule("IEA_MP01_UF4","UF4","Automatització pneumàtica i electropneumàtica","","active",4,"Normal",obtainModuleIdByCode("IEA_MP01"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP01_UF5","UF5","Automatització programable","","active",5,"Normal",obtainModuleIdByCode("IEA_MP01"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP01","MP01","Automatismes industrials","","active",1,"Normal");
        first_or_create_submodule("IEA_MP01_UF1","UF1","Dibuix tècnic aplicat als automatismes","","active",1,"Normal",obtainModuleIdByCode("IEA_MP01"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP01_UF2","UF2","Mecanització de quadres elèctrics","","active",2,"Normal",obtainModuleIdByCode("IEA_MP01"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP01_UF3","UF3","Automatització elèctrica cablada","","active",3,"Normal",obtainModuleIdByCode("IEA_MP01"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP02","MP02","Instal·lacions elèctriques d'interior","","active",2,"Normal");
        first_or_create_submodule("IEA_MP02_UF1","UF1","Equips, dispositius, materials i eines","","active",1,"Normal",obtainModuleIdByCode("IEA_MP02"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP02_UF2","UF2","Instal·lacions elèctriques interiors en edificis d'habitatges","","active",2,"Normal",obtainModuleIdByCode("IEA_MP02"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP02_UF3","UF3","Instal·lacions elèctriques interiors en locals, oficines i indústries","","active",3,"Normal",obtainModuleIdByCode("IEA_MP02"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP02_UF4","UF4","Documentació tècnica de les instal·lacions elèctriques d'interior","","active",4,"Normal",obtainModuleIdByCode("IEA_MP02"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP02_UF5","UF5","Informàtica bàsica aplicada al càlcul i la representació gràfica d'instal·lacions elèctriques","","active",5,"Normal",obtainModuleIdByCode("IEA_MP02"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP03","MP03","Instal·lacions de distribució","","active",3,"Normal");
        first_or_create_submodule("IEA_MP03_UF1","UF1","Centres de transformació i xarxes de distribució en baixa tensió","","active",1,"Normal",obtainModuleIdByCode("IEA_MP03"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP03_UF2","UF2","Instal·lacions d’enllaç","","active",2,"Normal",obtainModuleIdByCode("IEA_MP03"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP04","MP04","Infraestructures comunes de telecomunicació en habitatges i edificis","","active",4,"Normal");
        first_or_create_submodule("IEA_MP04_UF1","UF1","Instal·lacions d’antenes","","active",1,"Normal",obtainModuleIdByCode("IEA_MP04"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP04_UF2","UF2","Instal·lacions de telefonia interior i d'intercomunicació","","active",2,"Normal",obtainModuleIdByCode("IEA_MP04"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP05","MP05","Instal·lacions domòtiques","","active",5,"Normal");
        first_or_create_submodule("IEA_MP05_UF1","UF1","Automatització d'habitatges","","active",1,"Normal",obtainModuleIdByCode("IEA_MP05"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP05_UF2","UF2","Instal·lacions domòtiques amb sistemes descentralitzats de bus","","active",2,"Normal",obtainModuleIdByCode("IEA_MP05"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP05_UF3","UF3","Instal·lacions domòtiques amb autòmats programables","","active",3,"Normal",obtainModuleIdByCode("IEA_MP05"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP05_UF4","UF4","Instal·lacions domòtiques amb sistemes de corrents portadors","","active",4,"Normal",obtainModuleIdByCode("IEA_MP05"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP05_UF5","UF5","Instal·lacions domòtiques amb sistemes sense fil","","active",5,"Normal",obtainModuleIdByCode("IEA_MP05"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP06","MP06","Instal·lacions solars fotovoltaiques","","active",6,"Normal");
        first_or_create_submodule("IEA_MP06_UF1","UF1","Muntatge d'instal·lacions solars fotovoltaiques","","active",1,"Normal",obtainModuleIdByCode("IEA_MP06"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP06_UF2","UF2","Manteniment d'instal·lacions solars fotovoltaiques","","active",2,"Normal",obtainModuleIdByCode("IEA_MP06"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP07","MP07","Màquines elèctriques","","active",7,"Normal");
        first_or_create_submodule("IEA_MP07_UF1","UF1","Transformadors","","active",1,"Normal",obtainModuleIdByCode("IEA_MP07"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP07_UF2","UF2","Màquines rotatives de corrent continu","","active",2,"Normal",obtainModuleIdByCode("IEA_MP07"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP07_UF3","UF3","Màquines rotatives de corrent altern","","active",3,"Normal",obtainModuleIdByCode("IEA_MP07"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP08","MP08","Instal·lacions elèctriques especials","","active",8,"Normal");
        first_or_create_submodule("IEA_MP08_UF1","UF1","Instal·lacions d'enllumenat exterior","","active",1,"Normal",obtainModuleIdByCode("IEA_MP08"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP08_UF2","UF2","Instal·lacions de receptors i de característiques especials","","active",2,"Normal",obtainModuleIdByCode("IEA_MP08"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_submodule("IEA_MP08_UF3","UF3","Documentació tècnica de les instal·lacions elèctriques especials","","active",3,"Normal",obtainModuleIdByCode("IEA_MP08"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP09","MP09","Electrònica","","active",9,"Normal");
        first_or_create_submodule("IEA_MP09_UF1","UF1","Electrònica digital","","active",1,"Normal",obtainModuleIdByCode("IEA_MP09"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP09_UF2","UF2","Electrònica analògica","","active",2,"Normal",obtainModuleIdByCode("IEA_MP09"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP10","MP10","Electrotècnica","","active",10,"Normal");
        first_or_create_submodule("IEA_MP10_UF1","UF1","Corrent continu i electromagnetisme","","active",1,"Normal",obtainModuleIdByCode("IEA_MP10"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP10_UF2","UF2","Corrent altern","","active",2,"Normal",obtainModuleIdByCode("IEA_MP10"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP10_UF3","UF3","Màquines elèctriques","","active",3,"Normal",obtainModuleIdByCode("IEA_MP10"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP10_UF4","UF4","Seguretat en les instal·lacions electrotècniques","","active",4,"Normal",obtainModuleIdByCode("IEA_MP10"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("IEA_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("IEA_MP11"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_submodule("IEA_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("IEA_MP11"), [obtainClassroomIdByCode("1IEA")]);
        first_or_create_module("IEA_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("IEA_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("IEA_MP12"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP13","MP13","Anglès","","active",13,"Externes");
        first_or_create_submodule("IEA_MP13_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("IEA_MP13"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP14","MP14","Projecte de síntesi","","active",14,"Síntesi");
        first_or_create_submodule("IEA_MP14_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("IEA_MP14"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IEA_MP15","MP15","Formació en centres de treball","","active",15,"FCT");
        first_or_create_submodule("IEA_MP15_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("IEA_MP15"), [obtainClassroomIdByCode("2IEA")]);
        first_or_create_module("IME_MP01","MP01","Tècniques de fabricació","","active",1,"Normal");
        first_or_create_submodule("IME_MP01_UF1","UF1","Interpretació gràfica","","active",1,"Normal",obtainModuleIdByCode("IME_MP01"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP01_UF2","UF2","Materials","","active",2,"Normal",obtainModuleIdByCode("IME_MP01"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP01_UF3","UF3","Metrologia","","active",3,"Normal",obtainModuleIdByCode("IME_MP01"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP01_UF4","UF4","Mecanitzat manual","","active",4,"Normal",obtainModuleIdByCode("IME_MP01"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP01_UF5","UF5","Mecanitzat amb maquina-eina","","active",5,"Normal",obtainModuleIdByCode("IME_MP01"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP02","MP02","Tècniques d'unió i muntatge","","active",2,"Normal");
        first_or_create_submodule("IME_MP02_UF1","UF1","Procediments de muntatge i unió","","active",1,"Normal",obtainModuleIdByCode("IME_MP02"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP02_UF2","UF2","Conformació i unions no soldades","","active",2,"Normal",obtainModuleIdByCode("IME_MP02"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP02","MP02","Tècniques d'unió i muntatge","","active",2,"Normal");
        first_or_create_submodule("IME_MP02_UF3","UF3","Soldadura","","active",3,"Normal",obtainModuleIdByCode("IME_MP02"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP03","MP03","Electricitat i automatismes elèctrics","","active",3,"Normal");
        first_or_create_submodule("IME_MP03_UF3","UF3","Instal·lacions electrotècniques ","","active",3,"Normal",obtainModuleIdByCode("IME_MP03"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_submodule("IME_MP03_UF4","UF4","Quadres elèctrics ","","active",4,"Normal",obtainModuleIdByCode("IME_MP03"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP03","MP03","Electricitat i automatismes elèctrics","","active",3,"Normal");
        first_or_create_submodule("IME_MP03_UF1","UF1","Mesures en els circuits de C.C","","active",1,"Normal",obtainModuleIdByCode("IME_MP03"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP03_UF2","UF2","Mesures en els circuits de C.A","","active",2,"Normal",obtainModuleIdByCode("IME_MP03"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP04","MP04","Automatismes pneumàtics i hidràulics","","active",4,"Normal");
        first_or_create_submodule("IME_MP04_UF1","UF1","Automatismes pneumàtics","","active",1,"Normal",obtainModuleIdByCode("IME_MP04"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP04","MP04","Automatismes pneumàtics i hidràulics","","active",4,"Normal");
        first_or_create_submodule("IME_MP04_UF2","UF2","Automatismes hidràulics","","active",2,"Normal",obtainModuleIdByCode("IME_MP04"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_submodule("IME_MP04_UF3","UF3","Programació d’automatismes pneumàtics i hidràulics","","active",3,"Normal",obtainModuleIdByCode("IME_MP04"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP05","MP05","Muntatge i manteniment mecànic","","active",5,"Normal");
        first_or_create_submodule("IME_MP05_UF1","UF1","Elements de maquines","","active",1,"Normal",obtainModuleIdByCode("IME_MP05"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP05_UF2","UF2","Muntatge i posada en marxa de màquines","","active",2,"Normal",obtainModuleIdByCode("IME_MP05"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP05_UF3","UF3","Manteniment mecànic","","active",3,"Normal",obtainModuleIdByCode("IME_MP05"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP06","MP06","Muntatge i manteniment elèctric-electrònic","","active",6,"Normal");
        first_or_create_submodule("IME_MP06_UF1","UF1","Màquines elèctriques","","active",1,"Normal",obtainModuleIdByCode("IME_MP06"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP06_UF2","UF2","Muntatge i manteniment de màquines elèctriques","","active",2,"Normal",obtainModuleIdByCode("IME_MP06"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP06","MP06","Muntatge i manteniment elèctric-electrònic","","active",6,"Normal");
        first_or_create_submodule("IME_MP06_UF3","UF3","Sistemes automàtics per màquines elèctriques","","active",3,"Normal",obtainModuleIdByCode("IME_MP06"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP07","MP07","Muntatge i manteniment de línies automatitzades","","active",7,"Normal");
        first_or_create_submodule("IME_MP07_UF1","UF1","Organització  del manteniment industrial","","active",1,"Normal",obtainModuleIdByCode("IME_MP07"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_submodule("IME_MP07_UF2","UF2","Processos auxiliars de producció","","active",2,"Normal",obtainModuleIdByCode("IME_MP07"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_submodule("IME_MP07_UF3","UF3","Sistemes mecatrònics","","active",3,"Normal",obtainModuleIdByCode("IME_MP07"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_submodule("IME_MP07_UF4","UF4","Manteniment correctiu en sistemes mecatrònics","","active",4,"Normal",obtainModuleIdByCode("IME_MP07"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP08","MP08","Formació i orientació laboral","","active",8,"Externes");
        first_or_create_submodule("IME_MP08_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("IME_MP08"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_submodule("IME_MP08_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("IME_MP08"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP08","MP08","Formació i orientació laboral","","active",8,"Externes");
        first_or_create_submodule("IME_MP08_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("IME_MP08"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP09","MP09","Empresa i iniciativa emprenedora","","active",9,"Externes");
        first_or_create_submodule("IME_MP09_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("IME_MP09"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP10","MP10","Anglès","","active",10,"Externes");
        first_or_create_submodule("IME_MP10_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("IME_MP10"), [obtainClassroomIdByCode("1IME")]);
        first_or_create_module("IME_MP11","MP11","Projecte de manteniment electròmecanic","","active",11,"Síntesi");
        first_or_create_submodule("IME_MP11_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("IME_MP11"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("IME_MP12","MP12","Formació en centres de treball","","active",12,"FCT");
        first_or_create_submodule("IME_MP12_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("IME_MP12"), [obtainClassroomIdByCode("2IME")]);
        first_or_create_module("INS_MP01","MP01","Context de la intervenció social","","active",1,"Normal");
        first_or_create_submodule("INS_MP01_UF1","UF1","Marc de la intervenció social","","active",1,"Normal",obtainModuleIdByCode("INS_MP01"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP01_UF2","UF2","Necessitats de les persones en situació de discapacitat, malaltia mental, drogodependència o altres","","active",2,"Normal",obtainModuleIdByCode("INS_MP01"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP01_UF3","UF3","Necessitats de les persones en situació de risc social d'infants i adolescents, violència masclista","","active",3,"Normal",obtainModuleIdByCode("INS_MP01"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP01_UF4","UF4","Necessitats de les persones en situació d'exclusió social, discriminació per raó de sexe, lloc de pr","","active",4,"Normal",obtainModuleIdByCode("INS_MP01"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP02","MP02","Metodologia de la intervenció social","","active",2,"Normal");
        first_or_create_submodule("INS_MP02_UF1","UF1","Diagnòstic i anàlisi de la realitat","","active",1,"Normal",obtainModuleIdByCode("INS_MP02"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP02_UF2","UF2","Disseny de projectes d'intervenció social","","active",2,"Normal",obtainModuleIdByCode("INS_MP02"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP02_UF3","UF3","Difusió de projectes d'intervenció social","","active",3,"Normal",obtainModuleIdByCode("INS_MP02"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP03","MP03","Promoció de l'autonomia personal","","active",3,"Normal");
        first_or_create_submodule("INS_MP03_UF1","UF1","Entrenament d'habilitats d'autonomia personal i social","","active",1,"Normal",obtainModuleIdByCode("INS_MP03"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP03_UF2","UF2","Intervenció en les activitats de la vida diària","","active",2,"Normal",obtainModuleIdByCode("INS_MP03"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP03_UF3","UF3","Intervenció en l'adquisició de les competències bàsiques de mobilitat i orientació","","active",3,"Normal",obtainModuleIdByCode("INS_MP03"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP03_UF4","UF4","Entrenament o adquisició d'habilitats socials","","active",4,"Normal",obtainModuleIdByCode("INS_MP03"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP03_UF5","UF5","Estimulació, manteniment i rehabilitació de les capacitats cognitives","","active",5,"Normal",obtainModuleIdByCode("INS_MP03"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP04","MP04","Inserció sociolaboral","","active",4,"Normal");
        first_or_create_submodule("INS_MP04_UF1","UF1","Context de la inserció laboral","","active",1,"Normal",obtainModuleIdByCode("INS_MP04"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_submodule("INS_MP04_UF2","UF2","Entrenament en habilitats sociolaborals","","active",2,"Normal",obtainModuleIdByCode("INS_MP04"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_submodule("INS_MP04_UF3","UF3","Treball en suport","","active",3,"Normal",obtainModuleIdByCode("INS_MP04"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP05","MP05","Sistemes alternatius i augmentatius de comunicació","","active",5,"Normal");
        first_or_create_submodule("INS_MP05_UF1","UF1","Sistemes alternatius i augmentatius de comunicació","","active",1,"Normal",obtainModuleIdByCode("INS_MP05"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP06","MP06","Atenció a les unitats de convivència","","active",6,"Normal");
        first_or_create_submodule("INS_MP06_UF1","UF1","Intervenció en famílies","","active",1,"Normal",obtainModuleIdByCode("INS_MP06"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP06_UF2","UF2","Projectes d'intervenció en unitats de convivència","","active",2,"Normal",obtainModuleIdByCode("INS_MP06"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP06_UF3","UF3","Gestió de la unitat de convivència","","active",3,"Normal",obtainModuleIdByCode("INS_MP06"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP06_UF4","UF4","Intervenció en situacions de relacions abusives i de violència","","active",4,"Normal",obtainModuleIdByCode("INS_MP06"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP07","MP07","Suport a la intervenció educativa","","active",7,"Normal");
        first_or_create_submodule("INS_MP07_UF1","UF1","Suport a la intervenció educativa","","active",1,"Normal",obtainModuleIdByCode("INS_MP07"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP08","MP08","Medicació comunitària","","active",8,"Normal");
        first_or_create_submodule("INS_MP08_UF1","UF1","El servei de mediació","","active",1,"Normal",obtainModuleIdByCode("INS_MP08"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_submodule("INS_MP08_UF2","UF2","Processos de mediació","","active",2,"Normal",obtainModuleIdByCode("INS_MP08"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP09","MP09","Habilitats socials","","active",9,"Normal");
        first_or_create_submodule("INS_MP09_UF1","UF1","Habilitats de comunicació","","active",1,"Normal",obtainModuleIdByCode("INS_MP09"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP09_UF2","UF2","Dinamització de grups","","active",2,"Normal",obtainModuleIdByCode("INS_MP09"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP10","MP10","Primers auxilis","","active",10,"Normal");
        first_or_create_submodule("INS_MP10_UF1","UF1","Recursos i trasllat d'accidentats","","active",1,"Normal",obtainModuleIdByCode("INS_MP10"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP10_UF2","UF2","Suport vital bàsic (SVB) i ús de desfibril·ladors","","active",2,"Normal",obtainModuleIdByCode("INS_MP10"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP10_UF3","UF3","Atenció sanitària d'urgència","","active",3,"Normal",obtainModuleIdByCode("INS_MP10"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("INS_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("INS_MP11"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_submodule("INS_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("INS_MP11"), [obtainClassroomIdByCode("1INS A"), obtainClassroomIdByCode("1INS B")]);
        first_or_create_module("INS_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("INS_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("INS_MP11"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_submodule("INS_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("INS_MP11"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("INS_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("INS_MP12"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP13","MP13","Projecte d'integració social","","active",13,"Síntesi");
        first_or_create_submodule("INS_MP13_UF1","UF1","Projecte d'integració social","","active",1,"Síntesi",obtainModuleIdByCode("INS_MP13"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("INS_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("INS_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("INS_MP14"), [obtainClassroomIdByCode("2INS A"), obtainClassroomIdByCode("2INS B")]);
        first_or_create_module("IT_MP02","MP02","Infraestructures de xarxes de dades i sistemes de telefonia","","active",2,"Normal");
        first_or_create_submodule("IT_MP02_UF1","UF1","Muntatge de xarxes locals cablades","","active",1,"Normal",obtainModuleIdByCode("IT_MP02"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP02_UF2","UF2","Instal·lació i manteniment de xarxes locals cablades","","active",2,"Normal",obtainModuleIdByCode("IT_MP02"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP02_UF3","UF3","Infraestructures de xarxes de dades sense fil","","active",3,"Normal",obtainModuleIdByCode("IT_MP02"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP02_UF4","UF4","Centraletes telefòniques de baixa capacitat","","active",4,"Normal",obtainModuleIdByCode("IT_MP02"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP03","MP03","Instal·lacions de megafonia i sonorització","","active",3,"Normal");
        first_or_create_submodule("IT_MP03_UF1","UF1","Configuració d'instal·lacions de megafonia i sonorització","","active",1,"Normal",obtainModuleIdByCode("IT_MP03"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP03_UF2","UF2","Muntatge d'instal·lacions de megafonia i sonorització","","active",2,"Normal",obtainModuleIdByCode("IT_MP03"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP03_UF3","UF3","Manteniment d'instal·lacions de megafonia i sonorització","","active",3,"Normal",obtainModuleIdByCode("IT_MP03"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP04","MP04","Circuit tancat de televisió i seguretat electrònica","","active",4,"Normal");
        first_or_create_submodule("IT_MP04_UF1","UF1","Instal·lacions de circuit tancat de televisió","","active",1,"Normal",obtainModuleIdByCode("IT_MP04"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP04_UF2","UF2","Instal·lacions de seguretat electrònica","","active",2,"Normal",obtainModuleIdByCode("IT_MP04"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP05","MP05","Equips microinformàtics","","active",5,"Normal");
        first_or_create_submodule("IT_MP05_UF1","UF1","Muntatge d'equips informàtics","","active",1,"Normal",obtainModuleIdByCode("IT_MP05"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP05_UF2","UF2","Instal·lació d'equips informàtics","","active",2,"Normal",obtainModuleIdByCode("IT_MP05"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP05_UF3","UF3","Manteniment d'equips informàtics","","active",3,"Normal",obtainModuleIdByCode("IT_MP05"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP05_UF4","UF4","Aplicacions informàtiques","","active",4,"Normal",obtainModuleIdByCode("IT_MP05"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP07","MP07","Instal·lacions de rediocomunicacions","","active",7,"Normal");
        first_or_create_submodule("IT_MP07_UF1","UF1","Instal·lacions d'equips i sistemes de telecomunicacons","","active",1,"Normal",obtainModuleIdByCode("IT_MP07"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP07_UF2","UF2","Manteniment d'equips i sistemes de radiocomunicacions","","active",2,"Normal",obtainModuleIdByCode("IT_MP07"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP09","MP09","Electrònica apicada","","active",9,"Normal");
        first_or_create_submodule("IT_MP09_UF3","UF3","Electrònica digital no programable ","","active",3,"Normal",obtainModuleIdByCode("IT_MP09"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_submodule("IT_MP09_UF5","UF5","Electrònica digital microprogramable","","active",5,"Normal",obtainModuleIdByCode("IT_MP09"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP13","MP13","Síntesi","","active",13,"Síntesi");
        first_or_create_submodule("IT_MP13_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("IT_MP13"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("IT_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("IT_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("IT_MP14"), [obtainClassroomIdByCode("2IT")]);
        first_or_create_module("LCB_MP01","MP01","Gestió de mostres biològiques","","active",1,"Normal");
        first_or_create_submodule("LCB_MP01_UF1","UF1","Organització del sistema sanitari","","active",1,"Normal",obtainModuleIdByCode("LCB_MP01"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP01_UF2","UF2","Recollida, conservació i transport de mostres biològiques","","active",2,"Normal",obtainModuleIdByCode("LCB_MP01"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP01_UF3","UF3","Prevenció de riscos en la manipulació de productes químics i biològics","","active",3,"Normal",obtainModuleIdByCode("LCB_MP01"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_module("LCB_MP02","MP02","Tècniques generals de laboratori","","active",2,"Normal");
        first_or_create_submodule("LCB_MP02_UF1","UF1","Tècniques potenciomètriques i de separació de substàncies","","active",1,"Normal",obtainModuleIdByCode("LCB_MP02"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP02_UF2","UF2","Tècniques de microscòpia i digitalització d'imatge","","active",2,"Normal",obtainModuleIdByCode("LCB_MP02"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP02_UF3","UF3","Control de qualitat al laboratori","","active",3,"Normal",obtainModuleIdByCode("LCB_MP02"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_module("LCB_MP03","MP03","Biologia molecular i citogètica","","active",3,"Normal");
        first_or_create_submodule("LCB_MP03_UF1","UF1","Citogenètica i tècniques d'hibridació","","active",1,"Normal",obtainModuleIdByCode("LCB_MP03"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_submodule("LCB_MP03_UF2","UF2","Tècniques de biologia molecular","","active",2,"Normal",obtainModuleIdByCode("LCB_MP03"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("LCB_MP04","MP04","Anàlisi bioquímic","","active",4,"Normal");
        first_or_create_submodule("LCB_MP04_UF1","UF1","Tècniques de laboratori de bioquímica","","active",1,"Normal",obtainModuleIdByCode("LCB_MP04"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_submodule("LCB_MP04_UF2","UF2","Anàlisis bioquímiques dels components metabòlics","","active",2,"Normal",obtainModuleIdByCode("LCB_MP04"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_submodule("LCB_MP04_UF3","UF3","Anàlisis bioquímiques en líquids corporals, femtes i estudis","","active",3,"Normal",obtainModuleIdByCode("LCB_MP04"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("LCB_MP05","MP05","Microbiologia química","","active",5,"Normal");
        first_or_create_submodule("LCB_MP05_UF1","UF1","Identificació dels grups bacterians","","active",1,"Normal",obtainModuleIdByCode("LCB_MP05"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_submodule("LCB_MP05_UF2","UF2","Identificació de fongs, paràsits i virus","","active",2,"Normal",obtainModuleIdByCode("LCB_MP05"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("LCB_MP06","MP06","Tècniques d'anàlisi hematològic","","active",6,"Normal");
        first_or_create_submodule("LCB_MP06_UF1","UF1","Tècniques d'anàlisis de les cèl·lules sanguínies","","active",1,"Normal",obtainModuleIdByCode("LCB_MP06"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP06_UF2","UF2","Tècniques de valoració de l'hermostàsia","","active",2,"Normal",obtainModuleIdByCode("LCB_MP06"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP06_UF3","UF3","El banc de sang","","active",3,"Normal",obtainModuleIdByCode("LCB_MP06"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_module("LCB_MP07","MP07","Tècniques d'immunodiagnòstic","","active",7,"Normal");
        first_or_create_submodule("LCB_MP07_UF1","UF1","Tècniques immunològiques","","active",1,"Normal",obtainModuleIdByCode("LCB_MP07"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP07_UF2","UF2","Malalties immunitàries","","active",2,"Normal",obtainModuleIdByCode("LCB_MP07"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_module("LCB_MP08","MP08","Fisipatologia general","","active",8,"Normal");
        first_or_create_submodule("LCB_MP08_UF1","UF1","Fisipatologia de l'organisme humà","","active",1,"Normal",obtainModuleIdByCode("LCB_MP08"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_submodule("LCB_MP08_UF2","UF2","Fisiopatologia del sistema immunitari, infeccions i neoplàsies","","active",2,"Normal",obtainModuleIdByCode("LCB_MP08"), [obtainClassroomIdByCode("1LCB")]);
        first_or_create_module("LCB_MP09","MP09","Formació i orientació laboral","","active",9,"Normal");
        first_or_create_submodule("LCB_MP09_UF1","UF1","Incorporació al mon laboral","","active",1,"Normal",obtainModuleIdByCode("LCB_MP09"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_submodule("LCB_MP09_UF2","UF2","Prevenció de riscos laborals","","active",2,"Normal",obtainModuleIdByCode("LCB_MP09"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("LCB_MP10","MP10","Empresa i iniciativa emprenedora","","active",10,"Normal");
        first_or_create_submodule("LCB_MP10_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Normal",obtainModuleIdByCode("LCB_MP10"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("LCB_MP12","MP12","Projecte de laboratori mèdic i biomèdic","","active",12,"Síntesi");
        first_or_create_submodule("LCB_MP12_UF1","UF1","Projecte de laboratori mèdic i bimèdic","","active",1,"Síntesi",obtainModuleIdByCode("LCB_MP12"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("LCB_MP13","MP13","Formació en centres de treball","","active",13,"FCT");
        first_or_create_submodule("LCB_MP13_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("LCB_MP13"), [obtainClassroomIdByCode("2LCB")]);
        first_or_create_module("MAP_MP01","MP01","Atenció al client, consumidor i usuari","","active",1,"Normal");
        first_or_create_submodule("MAP_MP01_UF1","UF1","Organització de l'atenció al client consumidor i usuari","","active",1,"Normal",obtainModuleIdByCode("MAP_MP01"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP01_UF2","UF2","Gestió i manteniment de dades de clients","","active",2,"Normal",obtainModuleIdByCode("MAP_MP01"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP01_UF3","UF3","Gestió de processos de serveis al consumidor","","active",3,"Normal",obtainModuleIdByCode("MAP_MP01"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP02","MP02","Disseny i elaboració de material de comunicació","","active",2,"Normal");
        first_or_create_submodule("MAP_MP02_UF1","UF1","Planificació i organització del pla de comunicació","","active",1,"Normal",obtainModuleIdByCode("MAP_MP02"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_submodule("MAP_MP02_UF2","UF2","Elaboració del material de comunicació","","active",2,"Normal",obtainModuleIdByCode("MAP_MP02"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MAP_MP03","MP03","Gestió econòmica i financera de l'empresa","","active",3,"Normal");
        first_or_create_submodule("MAP_MP03_UF1","UF1","Emprenedoria, creació d'empresa, inversió i finançament","","active",1,"Normal",obtainModuleIdByCode("MAP_MP03"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP03_UF2","UF2","Operativa de compravenda i tesoreria","","active",2,"Normal",obtainModuleIdByCode("MAP_MP03"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP03_UF3","UF3","Comptabilitat i fiscalitat empresarial","","active",3,"Normal",obtainModuleIdByCode("MAP_MP03"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP04","MP04","Investigació comercial","","active",4,"Normal");
        first_or_create_submodule("MAP_MP04_UF1","UF1","Planificació de la investigació comercial","","active",1,"Normal",obtainModuleIdByCode("MAP_MP04"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP04_UF2","UF2","Fase exploratòria de la investigació","","active",2,"Normal",obtainModuleIdByCode("MAP_MP04"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP04_UF3","UF3","Fase concloent de la investigació","","active",3,"Normal",obtainModuleIdByCode("MAP_MP04"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP04_UF4","UF4","Tractament, anàlisi i conclusions","","active",4,"Normal",obtainModuleIdByCode("MAP_MP04"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP05","MP05","Treball de camp en la investigació comercial","","active",5,"Normal");
        first_or_create_submodule("MAP_MP05_UF1","UF1","Selecció, formació i motivació del personal de treball de camp","","active",1,"Normal",obtainModuleIdByCode("MAP_MP05"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_submodule("MAP_MP05_UF2","UF2","Organització i control del personal de treball de camp","","active",2,"Normal",obtainModuleIdByCode("MAP_MP05"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MAP_MP06","MP06","Llançament de productes i serveis","","active",6,"Normal");
        first_or_create_submodule("MAP_MP06_UF1","UF1","Planificació del llançament","","active",1,"Normal",obtainModuleIdByCode("MAP_MP06"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_submodule("MAP_MP06_UF2","UF2","Accions de llançament i control","","active",2,"Normal",obtainModuleIdByCode("MAP_MP06"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MAP_MP07","MP07","Màrqueting digital","","active",7,"Normal");
        first_or_create_submodule("MAP_MP07_UF1","UF1","Eines de màrqueting digital","","active",1,"Normal",obtainModuleIdByCode("MAP_MP07"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP07_UF2","UF2","Pla de màrqueting digital","","active",2,"Normal",obtainModuleIdByCode("MAP_MP07"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP08","MP08","Mitjans i suports de comunicació","","active",8,"Normal");
        first_or_create_submodule("MAP_MP08_UF1","UF1","Elaboració del pla de comunicació","","active",1,"Normal",obtainModuleIdByCode("MAP_MP08"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_submodule("MAP_MP08_UF2","UF2","Control i execució del pla de comunicació","","active",2,"Normal",obtainModuleIdByCode("MAP_MP08"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MAP_MP09","MP09","Polítiques de màrqueting","","active",9,"Normal");
        first_or_create_submodule("MAP_MP09_UF1","UF1","Organització comercial","","active",1,"Normal",obtainModuleIdByCode("MAP_MP09"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP09_UF2","UF2","Màrqueting estratègic","","active",2,"Normal",obtainModuleIdByCode("MAP_MP09"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP09_UF3","UF3","Màrqueting operacional","","active",3,"Normal",obtainModuleIdByCode("MAP_MP09"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP09_UF4","UF4","Pla de màrqueting","","active",4,"Normal",obtainModuleIdByCode("MAP_MP09"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP10","MP10","Relacions públiques i organització d'esdeveniments de màrqueting.","","active",10,"Normal");
        first_or_create_submodule("MAP_MP10_UF1","UF1","Relacions públiques i protocol empresarial","","active",1,"Normal",obtainModuleIdByCode("MAP_MP10"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_submodule("MAP_MP10_UF2","UF2","Organització d'esdeveniments de màrqueting","","active",2,"Normal",obtainModuleIdByCode("MAP_MP10"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MAP_MP11","MP11","Anglès","","active",11,"Normal");
        first_or_create_submodule("MAP_MP11_UF1","UF1","Àngles tècnic","","active",1,"Normal",obtainModuleIdByCode("MAP_MP11"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("MAP_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("MAP_MP12"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_submodule("MAP_MP12_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("MAP_MP12"), [obtainClassroomIdByCode("1MAP")]);
        first_or_create_module("MAP_MP13","MP13","Projecte de màrqueting i publicitat","","active",13,"Síntesi");
        first_or_create_submodule("MAP_MP13_UF1","UF1","Projecte de màrqueting i publicitat","","active",1,"Síntesi",obtainModuleIdByCode("MAP_MP13"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MAP_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("MAP_MP14_UF1","UF1","Formació en centres de treball","","active",2,"FCT",obtainModuleIdByCode("MAP_MP14"), [obtainClassroomIdByCode("2MAP")]);
        first_or_create_module("MEC_MP01","MP01","Processos de mecanitzacio","","active",1,"Normal");
        first_or_create_submodule("MEC_MP01_UF1","UF1","Processos de mecanització per arrencament de ferritja","","active",1,"Normal",obtainModuleIdByCode("MEC_MP01"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP01_UF2","UF2","Processos de mecanització per abrasió, electroerosió, procediments especials, tall i conformat","","active",2,"Normal",obtainModuleIdByCode("MEC_MP01"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP01_UF3","UF3","Costos de mecanitzat","","active",3,"Normal",obtainModuleIdByCode("MEC_MP01"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP01_UF4","UF4","Tractaments tèrmics","","active",4,"Normal",obtainModuleIdByCode("MEC_MP01"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP02","MP02","Mecanització per control numèric","","active",2,"Normal");
        first_or_create_submodule("MEC_MP02_UF1","UF1","Programació de màquines de CNC","","active",1,"Normal",obtainModuleIdByCode("MEC_MP02"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_submodule("MEC_MP02_UF2","UF2","Preparació de màquines de CNC","","active",2,"Normal",obtainModuleIdByCode("MEC_MP02"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_submodule("MEC_MP02_UF3","UF3","Mecanització en màquines de CNC","","active",3,"Normal",obtainModuleIdByCode("MEC_MP02"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("MEC_MP03","MP03","Fabricació per abrasió, electroerosió, tall i conformat i processos especials","","active",3,"Normal");
        first_or_create_submodule("MEC_MP03_UF4","UF4","Fabricació per tall","","active",4,"Normal",obtainModuleIdByCode("MEC_MP03"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP03_UF5","UF5","Processos de conformat","","active",5,"Normal",obtainModuleIdByCode("MEC_MP03"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP03","MP03","Fabricació per abrasió, electroerosió, tall i conformat i processos especials","","active",3,"Normal");
        first_or_create_submodule("MEC_MP03_UF1","UF1","Fabricació per abrasió","","active",1,"Normal",obtainModuleIdByCode("MEC_MP03"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_submodule("MEC_MP03_UF2","UF2","Fabricació per electroerosió","","active",2,"Normal",obtainModuleIdByCode("MEC_MP03"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_submodule("MEC_MP03_UF3","UF3","Fabricació per processos especials","","active",3,"Normal",obtainModuleIdByCode("MEC_MP03"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_submodule("MEC_MP03_UF6","UF6","Processos de soldadura","","active",6,"Normal",obtainModuleIdByCode("MEC_MP03"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("MEC_MP04","MP04","Fabricació per arrencament de ferritja","","active",4,"Normal");
        first_or_create_submodule("MEC_MP04_UF1","UF1","Torn","","active",1,"Normal",obtainModuleIdByCode("MEC_MP04"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP04_UF2","UF2","Fresadora","","active",2,"Normal",obtainModuleIdByCode("MEC_MP04"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP04_UF3","UF3","Màquines auxiliars per a l’arrencament de ferritja","","active",3,"Normal",obtainModuleIdByCode("MEC_MP04"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP04_UF4","UF4","Organització de processos de mecanitzat per arrencament de ferritja","","active",4,"Normal",obtainModuleIdByCode("MEC_MP04"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP05","MP05","Sistemes automatitzats","","active",5,"Normal");
        first_or_create_submodule("MEC_MP05_UF1","UF1","Preparació de sistemes automàtics","","active",1,"Normal",obtainModuleIdByCode("MEC_MP05"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_submodule("MEC_MP05_UF2","UF2","Programació de sistemes automàtics","","active",2,"Normal",obtainModuleIdByCode("MEC_MP05"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("MEC_MP06","MP06","Interpretació i representació gràfica","","active",6,"Normal");
        first_or_create_submodule("MEC_MP06_UF1","UF1","Interpretació gràfica","","active",1,"Normal",obtainModuleIdByCode("MEC_MP06"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP06_UF2","UF2","Representació gràfica","","active",2,"Normal",obtainModuleIdByCode("MEC_MP06"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP07","MP07","Metrologia i assaigs","","active",7,"Normal");
        first_or_create_submodule("MEC_MP07_UF1","UF1","Metrologia","","active",1,"Normal",obtainModuleIdByCode("MEC_MP07"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP07_UF2","UF2","Assajos mecànics, metal·logràfics i no destructius","","active",2,"Normal",obtainModuleIdByCode("MEC_MP07"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP07_UF3","UF3","Control de processos","","active",3,"Normal",obtainModuleIdByCode("MEC_MP07"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_submodule("MEC_MP07_UF4","UF4","Sistemes i models de gestió de qualitat","","active",4,"Normal",obtainModuleIdByCode("MEC_MP07"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP08","MP08","Formació i orientació laboral","","active",8,"Externes");
        first_or_create_submodule("MEC_MP08_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("MEC_MP08"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP08","MP08","Formació i orientació laboral","","active",8,"Externes");
        first_or_create_submodule("MEC_MP08_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("MEC_MP08"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("MEC_MP09","MP09","Empresa i iniciativa emprenedora","","active",9,"Externes");
        first_or_create_submodule("MEC_MP09_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("MEC_MP09"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("MEC_MP10","MP10","Anglès","","active",10,"Externes");
        first_or_create_submodule("MEC_MP10_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("MEC_MP10"), [obtainClassroomIdByCode("1MEC")]);
        first_or_create_module("MEC_MP11","MP11","Projecte de síntesi","","active",11,"Síntesi");
        first_or_create_submodule("MEC_MP11_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("MEC_MP11"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("MEC_MP12","MP12","Formació en centres de treball","","active",12,"FCT");
        first_or_create_submodule("MEC_MP12_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("MEC_MP12"), [obtainClassroomIdByCode("2MEC")]);
        first_or_create_module("PM_MP01","MP01","Interpretació i representació gràfica","","active",1,"Normal");
        first_or_create_submodule("PM_MP01_UF1","UF1","Interpretació gràfica","","active",1,"Normal",obtainModuleIdByCode("PM_MP01"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP01_UF2","UF2","Disseny Assistit per Ordinador (DAO)","","active",2,"Normal",obtainModuleIdByCode("PM_MP01"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP01","MP01","Interpretació i representació gràfica","","active",1,"Normal");
        first_or_create_submodule("PM_MP01_UF2","UF2","Disseny Assistit per Ordinador (DAO)","","active",2,"Normal",obtainModuleIdByCode("PM_MP01"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP01_UF3","UF3","Interpretació i representació de productes mecànics","","active",3,"Normal",obtainModuleIdByCode("PM_MP01"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP02","MP02","Definició de processos de mecanització, conformat i muntatge","","active",2,"Normal");
        first_or_create_submodule("PM_MP02_UF3","UF3","Optimització de processos","","active",3,"Normal",obtainModuleIdByCode("PM_MP02"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP02","MP02","Definició de processos de mecanització, conformat i muntatge","","active",2,"Normal");
        first_or_create_submodule("PM_MP02_UF1","UF1","Determinació de processos","","active",1,"Normal",obtainModuleIdByCode("PM_MP02"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP02_UF2","UF2","Organització de processos","","active",2,"Normal",obtainModuleIdByCode("PM_MP02"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP02","MP02","Definició de processos de mecanització, conformat i muntatge","","active",2,"Normal");
        first_or_create_submodule("PM_MP02_UF1","UF1","Determinació de processos","","active",1,"Normal",obtainModuleIdByCode("PM_MP02"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP02_UF2","UF2","Organització de processos","","active",2,"Normal",obtainModuleIdByCode("PM_MP02"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP03","MP03","Mecanització per control numèric","","active",3,"Normal");
        first_or_create_submodule("PM_MP03_UF1","UF1","Programació de màquines CNC","","active",1,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP03_UF2","UF2","Preparació de màquines CNC","","active",2,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP03_UF3","UF3","Mecanització amb màquines CNC","","active",3,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP03","MP03","Mecanització per control numèric","","active",3,"Normal");
        first_or_create_submodule("PM_MP03_UF1","UF1","Programació de màquines CNC","","active",1,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP03_UF2","UF2","Preparació de màquines CNC ","","active",2,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP03_UF3","UF3","Mecanització amb màquines CNC","","active",3,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP03_UF4","UF4","Execució de processos de mecanitzat amb CNC","","active",4,"Normal",obtainModuleIdByCode("PM_MP03"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP04","MP04","Fabricació assistida per ordinador","","active",4,"Normal");
        first_or_create_submodule("PM_MP04_UF1","UF1","CAD / CAM","","active",1,"Normal",obtainModuleIdByCode("PM_MP04"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_submodule("PM_MP04_UF2","UF2","Organització  i ajustatge del mecanitzat ","","active",2,"Normal",obtainModuleIdByCode("PM_MP04"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP04","MP04","Fabricació assistida per ordinador","","active",4,"Normal");
        first_or_create_submodule("PM_MP04_UF1","UF1","CAD / CAM","","active",1,"Normal",obtainModuleIdByCode("PM_MP04"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP04_UF2","UF2","Organització  i ajustatge del mecanitzat ","","active",2,"Normal",obtainModuleIdByCode("PM_MP04"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP05","MP05","Programació de sistemes automàtics de fabricació mecànica","","active",5,"Normal");
        first_or_create_submodule("PM_MP05_UF1","UF1","Automatismes elèctrics, pneumàtics i hidràulics","","active",1,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_submodule("PM_MP05_UF2","UF2","Sistemes automatitzats","","active",2,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_submodule("PM_MP05_UF3","UF3","Programació de robots industrials","","active",3,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP05","MP05","Programació de sistemes automàtics de fabricació mecànica","","active",5,"Normal");
        first_or_create_submodule("PM_MP05_UF1","UF1","Automatismes elèctrics, pneumàtics i hidràulics","","active",1,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP05_UF2","UF2","Sistemes automatitzats","","active",2,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP05_UF3","UF3","Programació de robots industrials","","active",3,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP05_UF4","UF4","M5 DUAL","","active",4,"Normal",obtainModuleIdByCode("PM_MP05"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP06","MP06","Programació de la producció","","active",6,"Normal");
        first_or_create_submodule("PM_MP06_UF1","UF1","Gestió de la producció","","active",1,"Normal",obtainModuleIdByCode("PM_MP06"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP06_UF2","UF2","Gestió de magatzems","","active",2,"Normal",obtainModuleIdByCode("PM_MP06"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP06","MP06","Programació de la producció","","active",6,"Normal");
        first_or_create_submodule("PM_MP06_UF1","UF1","Gestió de la producció","","active",1,"Normal",obtainModuleIdByCode("PM_MP06"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP06_UF2","UF2","Gestió de magatzems","","active",2,"Normal",obtainModuleIdByCode("PM_MP06"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP06_UF3","UF3","Control de la producció","","active",3,"Normal",obtainModuleIdByCode("PM_MP06"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP07","MP07","Execució de processos de fabricació","","active",7,"Normal");
        first_or_create_submodule("PM_MP07_UF2","UF2","Fabricació per tall i conformat","","active",2,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_submodule("PM_MP07_UF3","UF3","Aplicació de processos de soldadura i muntatge","","active",3,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP07","MP07","Execució de processos de fabricació","","active",7,"Normal");
        first_or_create_submodule("PM_MP07_UF1","UF1","Fabricació per arrencament de ferritja i procediments especials","","active",1,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP07_UF2","UF2","Fabricació per tall i conformat","","active",2,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP07_UF3","UF3","Aplicació de processos de soldadura i muntatge","","active",3,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP07","MP07","Execució de processos de fabricació","","active",7,"Normal");
        first_or_create_submodule("PM_MP07_UF2","UF2","Fabricació per tall i conformat","","active",2,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP07_UF2","UF2","Fabricació per tall i conformat","","active",2,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP07_UF3","UF3","Aplicació de processos de soldadura i muntatge","","active",3,"Normal",obtainModuleIdByCode("PM_MP07"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP08","MP08","Materials","","active",8,"Normal");
        first_or_create_submodule("PM_MP08_UF1","UF1","Propietats dels materials","","active",1,"Normal",obtainModuleIdByCode("PM_MP08"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP08_UF2","UF2","Tractaments tèrmics en materials metàl·lics","","active",2,"Normal",obtainModuleIdByCode("PM_MP08"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP09","MP09","Gestió de la qualitat, prevenció de riscos laborals i protecció ambientals","","active",9,"Normal");
        first_or_create_submodule("PM_MP09_UF1","UF1","Gestió de qualitat","","active",1,"Normal",obtainModuleIdByCode("PM_MP09"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_submodule("PM_MP09_UF2","UF2","Gestió de la prevenció de riscos laborals","","active",2,"Normal",obtainModuleIdByCode("PM_MP09"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_submodule("PM_MP09_UF3","UF3","Gestió de la protecció ambiental","","active",3,"Normal",obtainModuleIdByCode("PM_MP09"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP09","MP09","Gestió de la qualitat, prevenció de riscos laborals i protecció ambientals","","active",9,"Normal");
        first_or_create_submodule("PM_MP09_UF1","UF1","Gestió de qualitat","","active",1,"Normal",obtainModuleIdByCode("PM_MP09"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP09_UF2","UF2","Gestió de la prevenció de riscos laborals","","active",2,"Normal",obtainModuleIdByCode("PM_MP09"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_submodule("PM_MP09_UF3","UF3","Gestió de la protecció ambiental","","active",3,"Normal",obtainModuleIdByCode("PM_MP09"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP10","MP10","Verificació de productes","","active",10,"Normal");
        first_or_create_submodule("PM_MP10_UF1","UF1","Metrologia","","active",1,"Normal",obtainModuleIdByCode("PM_MP10"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP10_UF2","UF2","Assaigs mecànics, metal·logràfics i no destructius","","active",2,"Normal",obtainModuleIdByCode("PM_MP10"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP10_UF3","UF3","Control de processos","","active",3,"Normal",obtainModuleIdByCode("PM_MP10"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("PM_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("PM_MP11"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("PM_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("PM_MP11"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("PM_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("PM_MP11"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_submodule("PM_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("PM_MP11"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("PM_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("PM_MP12"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("PM_MP12_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("PM_MP12"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP13","MP13","Projecte de fabricació de productes mecànics","","active",13,"Síntesi");
        first_or_create_submodule("PM_MP13_UF1","UF1","Projecte de fabricació de productes mecànics","","active",1,"Síntesi",obtainModuleIdByCode("PM_MP13"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP13","MP13","Projecte de fabricació de productes mecànics","","active",13,"Síntesi");
        first_or_create_submodule("PM_MP13_UF1","UF1","Projecte de fabricació de productes mecànics","","active",1,"Síntesi",obtainModuleIdByCode("PM_MP13"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("PM_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("PM_MP14"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PM_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("PM_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("PM_MP14"), [obtainClassroomIdByCode("2PM")]);
        first_or_create_module("PM_MP15","MP15","Anglès","","active",15,"Externes");
        first_or_create_submodule("PM_MP15_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("PM_MP15"), [obtainClassroomIdByCode("1PM")]);
        first_or_create_module("PM_MP16","MP16","Programació de la producció en fabricació mecànica","","active",15,"FCT");
        first_or_create_submodule("PM_MP16_UF1","UF1","Formació dual en la programació de la producció en fabricació mecànica","","active",1,"FCT",obtainModuleIdByCode("PM_MP16"), [obtainClassroomIdByCode("2PM-Dual")]);
        first_or_create_module("PRID_MP01","MP01","Tractament de textos","","active",1,"Normal");
        first_or_create_submodule("PRID_MP01_UF1","UF1","Equips i programari de tractament de textos","","active",1,"Normal",obtainModuleIdByCode("PRID_MP01"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP01_UF2","UF2","Digitalització de textos","","active",2,"Normal",obtainModuleIdByCode("PRID_MP01"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP01_UF3","UF3","Tractament difital de textos","","active",3,"Normal",obtainModuleIdByCode("PRID_MP01"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP01_UF4","UF4","Aplicació de normes de correció","","active",4,"Normal",obtainModuleIdByCode("PRID_MP01"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP02","MP02","Tractament d'imatges en mapa de bits","","active",2,"Normal");
        first_or_create_submodule("PRID_MP02_UF1","UF1","Classificació i preparació d'originals d'imatge","","active",1,"Normal",obtainModuleIdByCode("PRID_MP02"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP02_UF2","UF2","Obtenció d'imatges digital","","active",2,"Normal",obtainModuleIdByCode("PRID_MP02"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP02_UF3","UF3","Ajust dimensional i tonal de les imatges","","active",3,"Normal",obtainModuleIdByCode("PRID_MP02"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP02","MP02","Tractaments d'imatges en mapa de bits","","active",2,"Normal");
        first_or_create_submodule("PRID_MP02_UF4","UF4","Realització de fotomuntatges","","active",4,"Normal",obtainModuleIdByCode("PRID_MP02"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_submodule("PRID_MP02_UF5","UF5","Obtenció de proves de color","","active",5,"Normal",obtainModuleIdByCode("PRID_MP02"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP03","MP03","Imposició i obtenció digital de la forma impressora","","active",3,"Normal");
        first_or_create_submodule("PRID_MP03_UF1","UF1","Traçat i imposició digital","","active",1,"Normal",obtainModuleIdByCode("PRID_MP03"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP03_UF2","UF2","Obtenció digital de formes impressores","","active",2,"Normal",obtainModuleIdByCode("PRID_MP03"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP04","MP04","Impressió digital","","active",4,"Normal");
        first_or_create_submodule("PRID_MP04_UF1","UF1","Tractament de la informació digital","","active",1,"Normal",obtainModuleIdByCode("PRID_MP04"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP04_UF2","UF2","Preparació de matéries primeres, consumibles i equips d'impressió digital","","active",2,"Normal",obtainModuleIdByCode("PRID_MP04"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP04","MP04","Impressió digital","","active",4,"Normal");
        first_or_create_submodule("PRID_MP04_UF3","UF3","Impressió, acabats i manteniment preventiu amb dispositius","","active",3,"Normal",obtainModuleIdByCode("PRID_MP04"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP05","MP05","Compaginació","","active",5,"Normal");
        first_or_create_submodule("PRID_MP05_UF1","UF1","Elaboració de maquetes i fulls d'estil","","active",1,"Normal",obtainModuleIdByCode("PRID_MP05"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_submodule("PRID_MP05_UF2","UF2","Compaginació de productes editorials","","active",2,"Normal",obtainModuleIdByCode("PRID_MP05"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_submodule("PRID_MP05_UF3","UF3","Compaginació de productes extra-editorials","","active",3,"Normal",obtainModuleIdByCode("PRID_MP05"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_submodule("PRID_MP05_UF4","UF4","Correcció de proves de compaginades","","active",4,"Normal",obtainModuleIdByCode("PRID_MP05"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP06","MP06","Il·lustració vectorial","","active",6,"Normal");
        first_or_create_submodule("PRID_MP06_UF1","UF1","Imatges vectorials i retolació","","active",1,"Normal",obtainModuleIdByCode("PRID_MP06"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP06_UF2","UF2","Composició infogràfica i il·lustració","","active",2,"Normal",obtainModuleIdByCode("PRID_MP06"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP07","MP07","Identificació de materials en preimpressió","","active",7,"Normal");
        first_or_create_submodule("PRID_MP07_UF1","UF1","Processos i productes gràfics","","active",1,"Normal",obtainModuleIdByCode("PRID_MP07"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP07_UF2","UF2","Formes impressores i emulsions","","active",2,"Normal",obtainModuleIdByCode("PRID_MP07"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP07_UF3","UF3","Suports d'impressió","","active",3,"Normal",obtainModuleIdByCode("PRID_MP07"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP07_UF4","UF4","Tintes d'impressió","","active",4,"Normal",obtainModuleIdByCode("PRID_MP07"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP08","MP08","Realització de publicacions electróniques","","active",8,"Normal");
        first_or_create_submodule("PRID_MP08_UF1","UF1","Preparació d'arxius de text, d'imatge, vídeo i so","","active",1,"Normal",obtainModuleIdByCode("PRID_MP08"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP08_UF2","UF2","Realització d'animacions","","active",2,"Normal",obtainModuleIdByCode("PRID_MP08"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP08_UF3","UF3","Creació i publicació de pàgines web","","active",3,"Normal",obtainModuleIdByCode("PRID_MP08"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP08","MP08","Realització de publicacions electròniques","","active",8,"Normal");
        first_or_create_submodule("PRID_MP08_UF4","UF4","Compaginació i publicació de llibres electrònics","","active",4,"Normal",obtainModuleIdByCode("PRID_MP08"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_submodule("PRID_MP08_UF5","UF5","Realització de productes multimèdia","","active",5,"Normal",obtainModuleIdByCode("PRID_MP08"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP09","MP09","Formació i orientació laboral","","active",9,"Externes");
        first_or_create_submodule("PRID_MP09_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("PRID_MP09"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_submodule("PRID_MP09_UF2","UF2","Prevenció de riscos laboral","","active",2,"Externes",obtainModuleIdByCode("PRID_MP09"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP09","MP09","Formació i orientació laboral","","active",9,"Normal");
        first_or_create_submodule("PRID_MP09_UF1","UF1","Incorporació al treball","","active",1,"Normal",obtainModuleIdByCode("PRID_MP09"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP10","MP10","Empresa i iniciativa emprenedora","","active",10,"Externes");
        first_or_create_submodule("PRID_MP10_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Normal",obtainModuleIdByCode("PRID_MP10"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP11","MP11","Anglès","","active",11,"Externes");
        first_or_create_submodule("PRID_MP11_UF1","UF1","Anglès","","active",1,"Externes",obtainModuleIdByCode("PRID_MP11"), [obtainClassroomIdByCode("1PRID")]);
        first_or_create_module("PRID_MP12","MP12","Síntesi","","active",12,"Síntesi");
        first_or_create_submodule("PRID_MP12_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("PRID_MP12"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRID_MP13","MP13","Formació en centres de treball","","active",13,"FCT");
        first_or_create_submodule("PRID_MP13_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("PRID_MP13"), [obtainClassroomIdByCode("2PRID")]);
        first_or_create_module("PRO_MP01","MP01","Presentacions de construcció","","active",1,"Normal");
        first_or_create_submodule("PRO_MP01_UF1","UF1","Representació bàsica de projectes de construcció","","active",1,"Normal",obtainModuleIdByCode("PRO_MP01"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP01_UF2","UF2","Representació assistida per ordinador","","active",2,"Normal",obtainModuleIdByCode("PRO_MP01"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP01_UF3","UF3","Presentació i gestió documental de projectes de construcció","","active",3,"Normal",obtainModuleIdByCode("PRO_MP01"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP02","MP02","Amidaments i valoracions de construcció","","active",2,"Normal");
        first_or_create_submodule("PRO_MP02_UF1","UF1","Amidaments i pressupostos","","active",1,"Normal",obtainModuleIdByCode("PRO_MP02"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP02_UF2","UF2","Control de costos","","active",2,"Normal",obtainModuleIdByCode("PRO_MP02"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRO_MP03","MP03","Replanteigs de construcció","","active",3,"Normal");
        first_or_create_submodule("PRO_MP03_UF1","UF1","Organització dels replanteigs","","active",1,"Normal",obtainModuleIdByCode("PRO_MP03"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP03_UF2","UF2","Replanteigs d'obres","","active",2,"Normal",obtainModuleIdByCode("PRO_MP03"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP04","MP04","Planificació de construcció","","active",4,"Normal");
        first_or_create_submodule("PRO_MP04_UF1","UF1","Estudis i plans de seguretat","","active",2,"Normal",obtainModuleIdByCode("PRO_MP04"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP04_UF2","UF2","Planificació de projectes i obres","","active",2,"Normal",obtainModuleIdByCode("PRO_MP04"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRO_MP05","MP05","Instal·lacions de edificació","","active",5,"Normal");
        first_or_create_submodule("PRO_MP05_UF1","UF1","Instal·lacions d'aigua i electricitat","","active",1,"Normal",obtainModuleIdByCode("PRO_MP05"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP05_UF2","UF2","Instal·lacions de gas, calefacció , climatització, ventilació i producció d'ACS","","active",2,"Normal",obtainModuleIdByCode("PRO_MP05"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP05_UF3","UF3","Instal·lacions especials, de protecció, contra incendis i de telecomunicacions","","active",3,"Normal",obtainModuleIdByCode("PRO_MP05"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP06","MP06","Eficiència energètica en edificació","","active",6,"Normal");
        first_or_create_submodule("PRO_MP06_UF1","UF1","Limitació de la demanda energètica d'edificis","","active",1,"Normal",obtainModuleIdByCode("PRO_MP06"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP06_UF2","UF2","Qualificació energètica d'edificis","","active",2,"Normal",obtainModuleIdByCode("PRO_MP06"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP07","MP07","Desenvolupament de projectes d'edificació residencial","","active",7,"Normal");
        first_or_create_submodule("PRO_MP07_UF1","UF1","Estudis previs de projectes d'edificació","","active",1,"Normal",obtainModuleIdByCode("PRO_MP07"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP07_UF2","UF2","Projecte bàsic d'edificació","","active",2,"Normal",obtainModuleIdByCode("PRO_MP07"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP07_UF3","UF3","Projecte executiu d'edificació","","active",3,"Normal",obtainModuleIdByCode("PRO_MP07"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP07_UF4","UF4","Projectes d'edificació amb programari de modelatge","","active",4,"Normal",obtainModuleIdByCode("PRO_MP07"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRO_MP08","MP08","Desenvolupament de projectes d'edificació no residencial","","active",8,"Normal");
        first_or_create_submodule("PRO_MP08_UF1","UF1","Organització i desenvolupament de projectes d'instal·lacions en edificació","","active",1,"Normal",obtainModuleIdByCode("PRO_MP08"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP08_UF2","UF2","Documentació gràfica de projectes d'instal·lacions en edificació","","active",2,"Normal",obtainModuleIdByCode("PRO_MP08"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_submodule("PRO_MP08_UF3","UF3","Documentació escrita de projectes d'instal·lacions en edificació","","active",3,"Normal",obtainModuleIdByCode("PRO_MP08"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRO_MP09","MP09","Estructures de construcció","","active",9,"Normal");
        first_or_create_submodule("PRO_MP09_UF1","UF1","Càlcul d'elements estructurals","","active",1,"Normal",obtainModuleIdByCode("PRO_MP09"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP09_UF2","UF2","Construcció d'elements estructurals","","active",2,"Normal",obtainModuleIdByCode("PRO_MP09"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP09_UF3","UF3","Terrenys i obres de terra","","active",3,"Normal",obtainModuleIdByCode("PRO_MP09"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP09_UF4","UF4","Àngles tècnic 1","","active",4,"Normal",obtainModuleIdByCode("PRO_MP09"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP10","MP10","Disseny i construcció d'edificis","","active",10,"Normal");
        first_or_create_submodule("PRO_MP10_UF1","UF1","Definició de projectes d'edificació","","active",1,"Normal",obtainModuleIdByCode("PRO_MP10"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP10_UF2","UF2","Solucions constructives en edificació","","active",2,"Normal",obtainModuleIdByCode("PRO_MP10"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP10_UF3","UF3","Estructures en edificació","","active",3,"Normal",obtainModuleIdByCode("PRO_MP10"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP10_UF4","UF4","Àngles tècnic 2","","active",4,"Normal",obtainModuleIdByCode("PRO_MP10"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP11","MP11","Formació i orientació laboral","","active",11,"Externes");
        first_or_create_submodule("PRO_MP11_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("PRO_MP11"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_submodule("PRO_MP11_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("PRO_MP11"), [obtainClassroomIdByCode("1PRO")]);
        first_or_create_module("PRO_MP12","MP12","Empresa i iniciativa emprenedora","","active",12,"Externes");
        first_or_create_submodule("PRO_MP12_UF1","UF1","Empresa i iniciativa emprenedora.","","active",1,"Externes",obtainModuleIdByCode("PRO_MP12"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRO_MP13","MP13","Projecte en edificació","","active",13,"Síntesi");
        first_or_create_submodule("PRO_MP13_UF1","UF1","Projecte en edificació","","active",1,"Síntesi",obtainModuleIdByCode("PRO_MP13"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRO_MP14","MP14","Formació en centres de treball","","active",14,"FCT");
        first_or_create_submodule("PRO_MP14_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("PRO_MP14"), [obtainClassroomIdByCode("2PRO")]);
        first_or_create_module("PRP_C1","C1","Gestió de la prevenció","","active",1,"Normal");
        first_or_create_submodule("PRP_C1_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C1"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C10","C10","Projecte de síntesi","","active",10,"Síntesi");
        first_or_create_submodule("PRP_C10_UD G","UD G","Unitat didàctica gobal","","active",1,"Síntesi",obtainModuleIdByCode("PRP_C10"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C2","C2","Riscos derivats de les condicions de treball","","active",2,"Normal");
        first_or_create_submodule("PRP_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C2"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C2","C2","Riscos derivats de les condicions de treball","","active",2,"Normal");
        first_or_create_submodule("PRP_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C2"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C3","C3","Riscos físics ambientals","","active",3,"Normal");
        first_or_create_submodule("PRP_C3_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C3"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C4","C4","Riscos químics i biològics ambientals","","active",4,"Normal");
        first_or_create_submodule("PRP_C4_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C4"), [obtainClassroomIdByCode("1PRP")]);
        first_or_create_module("PRP_C5","C5","Prevenció de ricos derivats de l'organització i càrrega de treball","","active",5,"Normal");
        first_or_create_submodule("PRP_C5_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C5"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C6","C6","Emergències","","active",6,"Normal");
        first_or_create_submodule("PRP_C6_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C6"), [obtainClassroomIdByCode("1PRP")]);
        first_or_create_module("PRP_C7","C7","Relacions en l'àmbit de treball","","active",7,"Normal");
        first_or_create_submodule("PRP_C7_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("PRP_C7"), [obtainClassroomIdByCode("1PRP")]);
        first_or_create_module("PRP_C8","C8","Formació i orientació laboral","","active",8,"Externes");
        first_or_create_submodule("PRP_C8_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("PRP_C8"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("PRP_C9","C9","Formació en centres de treball","","active",9,"FCT");
        first_or_create_submodule("PRP_C9_UD G","UD G","Unitat didàctica gobal","","active",1,"FCT",obtainModuleIdByCode("PRP_C9"), [obtainClassroomIdByCode("2PRP")]);
        first_or_create_module("SE_C1","C1","Gestió de la comunicació","","active",1,"Normal");
        first_or_create_submodule("SE_C1_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("SE_C1"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C10","C10","Formació en centres de treball","","active",9,"FCT");
        first_or_create_submodule("SE_C10_UD G","UD G","Unitat didàctica gobal","","active",1,"FCT",obtainModuleIdByCode("SE_C10"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C11","C11","Projecte de síntesi","","active",9,"Síntesi");
        first_or_create_submodule("SE_C11_UD G","UD G","Unitat didàctica gobal","","active",1,"Síntesi",obtainModuleIdByCode("SE_C11"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C2","C2","Atenció al públic i protocol","","active",2,"Normal");
        first_or_create_submodule("SE_C2_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("SE_C2"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C3","C3","Organització del servei i treball secret","","active",3,"Normal");
        first_or_create_submodule("SE_C3_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("SE_C3"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C4","C4","Gestió de dades","","active",4,"Normal");
        first_or_create_submodule("SE_C4_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("SE_C4"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C5","C5","Elaboració i presentació de documents","","active",5,"Normal");
        first_or_create_submodule("SE_C5_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("SE_C5"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C6","C6","Elements de dret","","active",6,"Normal");
        first_or_create_submodule("SE_C6_UD G","UD G","Unitat didàctica gobal","","active",1,"Normal",obtainModuleIdByCode("SE_C6"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C7","C7","Llengua estrangera (Anglès)","","active",7,"Externes");
        first_or_create_submodule("SE_C7_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("SE_C7"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C8","C8","Llengua estrangera (Francès)","","active",7,"Externes");
        first_or_create_submodule("SE_C8_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("SE_C8"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SE_C9","C9","Formació i orientació laboral","","active",9,"Externes");
        first_or_create_submodule("SE_C9_UD G","UD G","Unitat didàctica gobal","","active",1,"Externes",obtainModuleIdByCode("SE_C9"), [obtainClassroomIdByCode("SE")]);
        first_or_create_module("SEA_MP01","MP01","Tècniques i processos en instal·lacions elèctriques","","active",1,"Normal");
        first_or_create_submodule("SEA_MP01_UF2","UF2","Muntatge d’instal·lacions elèctriques especials.","","active",2,"Normal",obtainModuleIdByCode("SEA_MP01"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_submodule("SEA_MP01_UF3","UF3","Tècniques de muntatge de xarxes elèctriques","","active",3,"Normal",obtainModuleIdByCode("SEA_MP01"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SEA_MP02","MP02","Técniques i processos en instal·lacions domòtiques i automàtiques","","active",2,"Normal");
        first_or_create_submodule("SEA_MP02_UF3","UF3","Instal·lacions automatitzades en habitatges i edificis","","active",3,"Normal",obtainModuleIdByCode("SEA_MP02"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SEA_MP03","MP03","Configuració d'instal·lacions elèctriques","","active",3,"Normal");
        first_or_create_submodule("SEA_MP03_UF2","UF2","Configuració d’instal·lacions  elèctriques especials","","active",2,"Normal",obtainModuleIdByCode("SEA_MP03"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_submodule("SEA_MP03_UF4","UF4","Configuració d’instal·lacions solars fotovoltaiques","","active",4,"Normal",obtainModuleIdByCode("SEA_MP03"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SEA_MP04","MP04","Configuració d'instal·lacions domòtiques i automàtiques","","active",4,"Normal");
        first_or_create_submodule("SEA_MP04_UF1","UF1","Configuració d’instal·lacions automatitzades en habitatges i edificis","","active",1,"Normal",obtainModuleIdByCode("SEA_MP04"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SEA_MP06","MP06","Desenvolupament de xarxes elèctriques i centres de transformació","","active",6,"Normal");
        first_or_create_submodule("SEA_MP06_UF1","UF1","Configuració de xarxes de distribució en baixa tensió","","active",1,"Normal",obtainModuleIdByCode("SEA_MP06"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_submodule("SEA_MP06_UF2","UF2","Configuració de centres de transformació","","active",2,"Normal",obtainModuleIdByCode("SEA_MP06"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SEA_MP07","MP07","Gestió del muntatge i del manteniment d'instal·lacions elèctriques","","active",7,"Normal");
        first_or_create_submodule("SEA_MP07_UF1","UF1","Aprovisionament del muntatge d’instal·lacions elèctriques","","active",1,"Normal",obtainModuleIdByCode("SEA_MP07"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_submodule("SEA_MP07_UF2","UF2","Planificació del muntatge i del manteniment d’instal·lacions elèctriques","","active",2,"Normal",obtainModuleIdByCode("SEA_MP07"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SEA_MP12","MP12","Projecte de sistemes electrònics i automatitzats","","active",12,"Síntesi");
        first_or_create_submodule("SEA_MP12_UF1","UF1","Projecte de sistemes electrotècnics i automatitzats","","active",1,"Síntesi",obtainModuleIdByCode("SEA_MP12"), [obtainClassroomIdByCode("2SEA")]);
        first_or_create_module("SIC_MP02","MP02","Traçat, tall i conformat","","active",2,"Normal");
        first_or_create_submodule("SIC_MP02_UF1","UF1","Preparació i organització del treball","","active",1,"Normal",obtainModuleIdByCode("SIC_MP02"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_submodule("SIC_MP02_UF2","UF2","Traçat i marcat","","active",2,"Normal",obtainModuleIdByCode("SIC_MP02"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_module("SIC_MP04","MP04","Soldadura en atmosfera natural","","active",4,"Normal");
        first_or_create_submodule("SIC_MP04_UF1","UF1","Soldadura amb arc elèctric i elèctrode revestit","","active",1,"Normal",obtainModuleIdByCode("SIC_MP04"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_submodule("SIC_MP04_UF2","UF2","Soldadura i projecció tèrmica per oxigàs","","active",2,"Normal",obtainModuleIdByCode("SIC_MP04"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_module("SIC_MP05","MP05","Soldadura en atmosfera protegida","","active",5,"Normal");
        first_or_create_submodule("SIC_MP05_UF1","UF1","Soldadura TIG","","active",1,"Normal",obtainModuleIdByCode("SIC_MP05"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_submodule("SIC_MP05_UF2","UF2","Soldadura MIG/MAG","","active",2,"Normal",obtainModuleIdByCode("SIC_MP05"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_submodule("SIC_MP05_UF3","UF3","Projecció tèrmica amb arc elèctric","","active",3,"Normal",obtainModuleIdByCode("SIC_MP05"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_module("SIC_MP06","MP06","Muntatge","","active",6,"Normal");
        first_or_create_submodule("SIC_MP06_UF1","UF1","Planificació i preparació del muntatge","","active",1,"Normal",obtainModuleIdByCode("SIC_MP06"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_submodule("SIC_MP06_UF2","UF2","Realització del muntatge ","","active",2,"Normal",obtainModuleIdByCode("SIC_MP06"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_submodule("SIC_MP06_UF3","UF3","Reparació i acabat de construccions metàl·liques","","active",3,"Normal",obtainModuleIdByCode("SIC_MP06"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_module("SIC_MP11","MP11","Projecte de soldadura i calderia","","active",11,"Síntesi");
        first_or_create_submodule("SIC_MP11_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("SIC_MP11"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_module("SIC_MP12","MP12","Formació en centres de treball","","active",12,"FCT");
        first_or_create_submodule("SIC_MP12_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("SIC_MP12"), [obtainClassroomIdByCode("2SIC")]);
        first_or_create_module("SMX_MP01","MP01","Muntatge i manteniment d'equips","","active",1,"Normal");
        first_or_create_submodule("SMX_MP01_UF1","UF1","Electricitat a l'ordinador","","active",1,"Normal",obtainModuleIdByCode("SMX_MP01"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP01_UF2","UF2","Components d'un equip microinformàtic","","active",2,"Normal",obtainModuleIdByCode("SMX_MP01"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP01_UF3","UF3","Muntatge d'un equip microinformàtic","","active",3,"Normal",obtainModuleIdByCode("SMX_MP01"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP01_UF4","UF4","Noves tendències de muntatge","","active",4,"Normal",obtainModuleIdByCode("SMX_MP01"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP01_UF5","UF5","Manteniment d'equips microinformàtics","","active",5,"Normal",obtainModuleIdByCode("SMX_MP01"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP01_UF6","UF6","Instal·lació de programari","","active",6,"Normal",obtainModuleIdByCode("SMX_MP01"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_module("SMX_MP02","MP02","Sistemes operatius monolloc","","active",2,"Normal");
        first_or_create_submodule("SMX_MP02_UF1","UF1","Introducció als sistemes operatius","","active",1,"Normal",obtainModuleIdByCode("SMX_MP02"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP02_UF2","UF2","Sistemes operatius propietaris","","active",2,"Normal",obtainModuleIdByCode("SMX_MP02"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP02_UF3","UF3","Sistemes operatius lliures","","active",3,"Normal",obtainModuleIdByCode("SMX_MP02"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_module("SMX_MP03","MP03","Aplicacions ofimàtiques","","active",3,"Normal");
        first_or_create_submodule("SMX_MP03_UF1","UF1","Aplicacions ofimàtiques i atenció a l'usuari","","active",1,"Normal",obtainModuleIdByCode("SMX_MP03"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP03_UF2","UF2","Correu i l'agenda electrònica","","active",2,"Normal",obtainModuleIdByCode("SMX_MP03"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP03_UF3","UF3","Processadors de text","","active",3,"Normal",obtainModuleIdByCode("SMX_MP03"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP03_UF4","UF4","Fulls de càlcul","","active",4,"Normal",obtainModuleIdByCode("SMX_MP03"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP03_UF5","UF5","Bases de dades","","active",5,"Normal",obtainModuleIdByCode("SMX_MP03"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP03_UF6","UF6","Imatge i vídeo - Presentacions","","active",6,"Normal",obtainModuleIdByCode("SMX_MP03"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_module("SMX_MP04","MP04","Sistemes operatius en xarxa","","active",4,"Normal");
        first_or_create_submodule("SMX_MP04_UF1","UF1","Sistemes operatius propietaris en xarxa","","active",1,"Normal",obtainModuleIdByCode("SMX_MP04"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP04_UF2","UF2","Sistemes operatius lliures en xarxa","","active",2,"Normal",obtainModuleIdByCode("SMX_MP04"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP04_UF3","UF3","Compartició de recursos i seguretat","","active",3,"Normal",obtainModuleIdByCode("SMX_MP04"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP04_UF4","UF4","Integració de sistemes operatius","","active",4,"Normal",obtainModuleIdByCode("SMX_MP04"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("SMX_MP05","MP05","Xarxes locals","","active",5,"Normal");
        first_or_create_submodule("SMX_MP05_UF1","UF1","Introducció a les xarxes locals","","active",1,"Normal",obtainModuleIdByCode("SMX_MP05"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP05_UF2","UF2","Configuració de commutadors i encaminadors","","active",2,"Normal",obtainModuleIdByCode("SMX_MP05"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP05_UF3","UF3","Resolució d'incidències en xarxes locals","","active",3,"Normal",obtainModuleIdByCode("SMX_MP05"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_module("SMX_MP06","MP06","Seguretat informàtica","","active",6,"Normal");
        first_or_create_submodule("SMX_MP06_UF1","UF1","Seguretat passiva","","active",1,"Normal",obtainModuleIdByCode("SMX_MP06"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP06_UF2","UF2","Còpies de seguretat","","active",2,"Normal",obtainModuleIdByCode("SMX_MP06"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP06_UF3","UF3","Legislació de seguretat i protecció de dades","","active",3,"Normal",obtainModuleIdByCode("SMX_MP06"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP06_UF4","UF4","Seguretat activa","","active",4,"Normal",obtainModuleIdByCode("SMX_MP06"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP06_UF5","UF5","Tallafocs i monitoratge de xarxes","","active",5,"Normal",obtainModuleIdByCode("SMX_MP06"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("SMX_MP07","MP07","Serveis en xarxa","","active",7,"Normal");
        first_or_create_submodule("SMX_MP07_UF1","UF1","Configuració de la xarxa (DNS i DHCP)","","active",1,"Normal",obtainModuleIdByCode("SMX_MP07"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP07_UF2","UF2","Correu electrònic i transmissió d'arxius","","active",2,"Normal",obtainModuleIdByCode("SMX_MP07"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP07_UF3","UF3","Servidor web i servidor intermediari o proxy","","active",3,"Normal",obtainModuleIdByCode("SMX_MP07"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP07_UF4","UF4","Accés a sistemes remots","","active",4,"Normal",obtainModuleIdByCode("SMX_MP07"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("SMX_MP08","MP08","Aplicacions web","","active",8,"Normal");
        first_or_create_submodule("SMX_MP08_UF1","UF1","Ofimàtica i eines Web","","active",1,"Normal",obtainModuleIdByCode("SMX_MP08"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP08_UF2","UF2","Gestors d'arxius web","","active",2,"Normal",obtainModuleIdByCode("SMX_MP08"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP08_UF3","UF3","Gestors de continguts","","active",3,"Normal",obtainModuleIdByCode("SMX_MP08"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP08_UF4","UF4","Portals web d'aprenentatge","","active",4,"Normal",obtainModuleIdByCode("SMX_MP08"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_submodule("SMX_MP08_UF5","UF5","Fonaments d'HTML i fulls d'estil","","active",5,"Normal",obtainModuleIdByCode("SMX_MP08"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("SMX_MP09","MP09","Formació i orientació laboral","","active",9,"Externes");
        first_or_create_submodule("SMX_MP09_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("SMX_MP09"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_submodule("SMX_MP09_UF2","UF2","Prevenció de riscos laborals","","active",2,"Externes",obtainModuleIdByCode("SMX_MP09"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_module("SMX_MP10","MP10","Empresa i iniciativa emprenedora","","active",10,"Externes");
        first_or_create_submodule("SMX_MP10_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("SMX_MP10"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("SMX_MP11","MP11","Anglès","","active",11,"Externes");
        first_or_create_submodule("SMX_MP11_UF1","UF1","Anglès tècnic","","active",1,"Externes",obtainModuleIdByCode("SMX_MP11"), [obtainClassroomIdByCode("1SMX A"), obtainClassroomIdByCode("1SMX B"), obtainClassroomIdByCode("1SMX C")]);
        first_or_create_module("SMX_MP12","MP12","Projecte de síntesi","","active",12,"Síntesi");
        first_or_create_submodule("SMX_MP12_UF1","UF1","Síntesi","","active",1,"Síntesi",obtainModuleIdByCode("SMX_MP12"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("SMX_MP13","MP13","Formació en centres de treball","","active",13,"Externes");
        first_or_create_submodule("SMX_MP13_UF1","UF1","Formació en centres de treball","","active",1,"Externes",obtainModuleIdByCode("SMX_MP13"), [obtainClassroomIdByCode("2SMX A"), obtainClassroomIdByCode("2SMX B")]);
        first_or_create_module("STI_MP01","MP01","Configuració d'infraestructures de sistemes de telecomunicacions","","active",1,"Normal");
        first_or_create_submodule("STI_MP01_UF1","UF1","ICT per senyals de radiodifusió sonora i televisió","","active",1,"Normal",obtainModuleIdByCode("STI_MP01"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP01_UF2","UF2","ICT per a serveis de telefonia i banda ampla","","active",2,"Normal",obtainModuleIdByCode("STI_MP01"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP02","MP02","Sistemes informàtics i xarxes locals","","active",2,"Normal");
        first_or_create_submodule("STI_MP02_UF1","UF1","Selecció i configuració d’equips informàtics","","active",1,"Normal",obtainModuleIdByCode("STI_MP02"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP02","MP02","Sistemes informàtics i xarxes locals","","active",2,"Normal");
        first_or_create_submodule("STI_MP02_UF1","UF1","Selecció i configuració d’equips informàtics","","active",1,"Normal",obtainModuleIdByCode("STI_MP02"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP02_UF2","UF2","Configuració de serveis generals i funcions específiques en el sistema informàtic","","active",2,"Normal",obtainModuleIdByCode("STI_MP02"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP02_UF3","UF3","Configuració d’infraestructures de xarxes de veu i dades amb cablatge estructurat","","active",3,"Normal",obtainModuleIdByCode("STI_MP02"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP02_UF4","UF4","Xarxes d’àrea local i sense fil. Disseny i configuració","","active",4,"Normal",obtainModuleIdByCode("STI_MP02"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP02_UF5","UF5","Posada en marxa i manteniment de sistemes informàtics i xarxes de dades","","active",5,"Normal",obtainModuleIdByCode("STI_MP02"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP03","MP03","Tècniques i processos en infraestructures de telecomunicacions","","active",3,"Normal");
        first_or_create_submodule("STI_MP03_UF1","UF1","Replanteig d’infraestructures de sistemes de telecomunicació","","active",1,"Normal",obtainModuleIdByCode("STI_MP03"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP03_UF2","UF2","Muntatge i manteniment de conjunts de captació i distribució de senyals de ràdio i TV","","active",2,"Normal",obtainModuleIdByCode("STI_MP03"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP03_UF3","UF3","Muntatge i manteniment d’infraestructures d’accés al servei de telefonia i xarxes de banda ampla","","active",3,"Normal",obtainModuleIdByCode("STI_MP03"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP04","MP04","Sistemes de producció audiovisual","","active",4,"Normal");
        first_or_create_submodule("STI_MP04_UF1","UF1","Muntatge d’instal·lacions de so","","active",1,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("2STI")]);
        first_or_create_submodule("STI_MP04_UF2","UF2","Muntatge d’instal·lacions d’imatge","","active",2,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("2STI")]);
        first_or_create_submodule("STI_MP04_UF3","UF3","Manteniment d’instal·lacions d’imatge i so","","active",3,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP04_UF3","UF3","Manteniment d’instal·lacions d’imatge i so","","active",3,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("2STI")]);
        first_or_create_module("STI_MP04","MP04","Sistemes de producció audiovisual","","active",4,"Normal");
        first_or_create_submodule("STI_MP04_UF1","UF1","Muntatge d’instal·lacions de so","","active",1,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP04_UF2","UF2","Muntatge d’instal·lacions d’imatge","","active",2,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP04_UF3","UF3","Manteniment d’instal·lacions d’imatge i so","","active",3,"Normal",obtainModuleIdByCode("STI_MP04"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP05","MP05","Sistemes de radiocomunicacions","","active",5,"Normal");
        first_or_create_submodule("STI_MP05_UF1","UF1","Sistemes de transmissió per a ràdio i televisió","","active",1,"Normal",obtainModuleIdByCode("STI_MP05"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP05_UF2","UF2","Muntatge i manteniment de sistemes de ràdio i TV","","active",2,"Normal",obtainModuleIdByCode("STI_MP05"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP06","MP06","Gestió de projectes d'instal·lacions de telecomunicacions","","active",6,"Normal");
        first_or_create_submodule("STI_MP06_UF1","UF1","Plànols i esquemes d’instal·lacions de telecomunicacions","","active",1,"Normal",obtainModuleIdByCode("STI_MP06"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP06_UF2","UF2","Documentació tècnica de telecomunicacions","","active",2,"Normal",obtainModuleIdByCode("STI_MP06"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP06","MP06","Gestió de projectes d'instal·lacions de telecomunicacions","","active",6,"Normal");
        first_or_create_submodule("STI_MP06_UF1","UF1","Plànols i esquemes d’instal·lacions de telecomunicacions","","active",1,"Normal",obtainModuleIdByCode("STI_MP06"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP06_UF2","UF2","Documentació tècnica de telecomunicacions","","active",2,"Normal",obtainModuleIdByCode("STI_MP06"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP07","MP07","Sistemes de telefonia fixa i mòbil","","active",7,"Normal");
        first_or_create_submodule("STI_MP07_UF1","UF1","Sistemes de telefonia fixa","","active",1,"Normal",obtainModuleIdByCode("STI_MP07"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP07_UF2","UF2","Sistemes de telefonia mòbil i radiocomunicacions","","active",2,"Normal",obtainModuleIdByCode("STI_MP07"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP07_UF3","UF3","Sistemes de telefonia en xarxes IP","","active",3,"Normal",obtainModuleIdByCode("STI_MP07"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP08","MP08","Elements de sistemes de telecomunicacions","","active",8,"Normal");
        first_or_create_submodule("STI_MP08_UF1","UF1","Introducció als sistemes elèctrics i electrònics","","active",1,"Normal",obtainModuleIdByCode("STI_MP08"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP08_UF2","UF2","Caracterització dels sistemes i senyals de telecomunicacions","","active",2,"Normal",obtainModuleIdByCode("STI_MP08"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP08_UF3","UF3","Elements de conducció dels senyals. Antenes i línies de transmissió","","active",3,"Normal",obtainModuleIdByCode("STI_MP08"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP08_UF3","UF3","Mesures de senyals","","active",3,"Normal",obtainModuleIdByCode("STI_MP08"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP08","MP08","Elements de sistemes de telecomunicacions","","active",8,"Normal");
        first_or_create_submodule("STI_MP08_UF3","UF3","Mesures de senyals","","active",3,"Normal",obtainModuleIdByCode("STI_MP08"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP09","MP09","Xarxes telemàtiques","","active",9,"Normal");
        first_or_create_submodule("STI_MP09_UF1","UF1","Protocols d’àrea estesa i configuració d’encaminadors","","active",1,"Normal",obtainModuleIdByCode("STI_MP09"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP09_UF2","UF2","Protocols i configuració de dispositius d’àrea local i de seguretat","","active",2,"Normal",obtainModuleIdByCode("STI_MP09"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP09_UF3","UF3","Manteniment i verificació de sistemes telemàtics","","active",3,"Normal",obtainModuleIdByCode("STI_MP09"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP09","MP09","Xarxes telemàtiques","","active",9,"Normal");
        first_or_create_submodule("STI_MP09_UF1","UF1","Protocols d’àrea estesa i configuració d’encaminadors","","active",1,"Normal",obtainModuleIdByCode("STI_MP09"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP09_UF2","UF2","Protocols i configuració de dispositius d’àrea local i de seguretat","","active",2,"Normal",obtainModuleIdByCode("STI_MP09"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP09_UF3","UF3","Manteniment i verificació de sistemes telemàtics","","active",3,"Normal",obtainModuleIdByCode("STI_MP09"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP10","MP10","Sistemes intregrats i llar digital","","active",10,"Normal");
        first_or_create_submodule("STI_MP10_UF1","UF1","Comunicacions, Seguretat i Control de l’entorn","","active",1,"Normal",obtainModuleIdByCode("STI_MP10"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP10_UF2","UF2","Accés interactiu i emmagatzematge a continguts multimèdia","","active",2,"Normal",obtainModuleIdByCode("STI_MP10"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP10","MP10","Sistemes integrats i llar digital","","active",10,"Normal");
        first_or_create_submodule("STI_MP10_UF1","UF1","Comunicacions, Seguretat i Control de l’entorn","","active",1,"Normal",obtainModuleIdByCode("STI_MP10"), [obtainClassroomIdByCode("2STI")]);
        first_or_create_submodule("STI_MP10_UF2","UF2","Accés interactiu i emmagatzematge a continguts multimèdia","","active",2,"Normal",obtainModuleIdByCode("STI_MP10"), [obtainClassroomIdByCode("2STI")]);
        first_or_create_module("STI_MP11","MP11","Fonaments de programació","","active",11,"Normal");
        first_or_create_submodule("STI_MP11_UF1","UF1","Programació estructurada","","active",1,"Normal",obtainModuleIdByCode("STI_MP11"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_submodule("STI_MP11_UF2","UF2","Disseny Modular","","active",2,"Normal",obtainModuleIdByCode("STI_MP11"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("STI_MP12_UF1","UF1","Incorporaciño al treball","","active",1,"Externes",obtainModuleIdByCode("STI_MP12"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP12","MP12","Formació i orientació laboral","","active",12,"Externes");
        first_or_create_submodule("STI_MP12_UF1","UF1","Incorporació al treball","","active",1,"Externes",obtainModuleIdByCode("STI_MP12"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP13","MP13","Empresa i iniciativa emprenedora","","active",13,"Externes");
        first_or_create_submodule("STI_MP13_UF1","UF1","Empresa i iniciativa emprenedora","","active",1,"Externes",obtainModuleIdByCode("STI_MP13"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP14","MP14","Projecte de sistemes de telecomunicacions i informàtics","","active",14,"Síntesi");
        first_or_create_submodule("STI_MP14_UF1","UF1","Projecte de sistemes de telecomunicacions i informàtics","","active",1,"Síntesi",obtainModuleIdByCode("STI_MP14"), [obtainClassroomIdByCode("1STI")]);
        first_or_create_module("STI_MP15","MP15","Formació en centres de treball","","active",15,"FCT");
        first_or_create_submodule("STI_MP15_UF1","UF1","Formació en centres de treball","","active",1,"FCT",obtainModuleIdByCode("STI_MP15"), [obtainClassroomIdByCode("1STI")]);


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
