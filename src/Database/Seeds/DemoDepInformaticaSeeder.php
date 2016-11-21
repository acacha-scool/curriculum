<?php

namespace Scool\Curriculum\Database\Seeds;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Speciality;
use Scool\Curriculum\Models\Submodule;
use Scool\Curriculum\Models\Module;
use Scool\Curriculum\Models\Course;
use Acacha\Periods\Period;

/**
 * Class DemoDepInfomaticaSeeder.
 *
 * @package Scool\Curriculum\Database\Seeds
 */
class DemoDepInformaticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDepartment();
        $this->createDepInformaticaDAM();
        $this->createDepInformaticaASIX();
        $this->createDepInformaticaSMX();
    }

    private function createDepartment()
    {

    }

    private function createDepInformaticaDAM()
    {
        $this->createDepInformaticaDAMCurs1();
        $this->createDepInformaticaDAMCurs2();
    }

    private function createDepInformaticaDAMCurs1()
    {

    }

    private function createDepInformaticaDAMCurs2()
    {
        $classroom = new Classroom();
        $classroom->name = "2n Desenvolupament d'Aplicacions multiplataforma";
        //TODO alternative names
        $classroom->save();

        $this->createDepInformaticaDAMCurs2MP2($classroom);
        $this->createDepInformaticaDAMCurs2MP3($classroom);
        $this->createDepInformaticaDAMCurs2MP5($classroom);
        $this->createDepInformaticaDAMCurs2MP6($classroom);
        $this->createDepInformaticaDAMCurs2MP7($classroom);
        $this->createDepInformaticaDAMCurs2MP8($classroom);
        $this->createDepInformaticaDAMCurs2MP9($classroom);
        $this->createDepInformaticaDAMCurs2MP10($classroom);
        $this->createDepInformaticaDAMCurs2MP13Sintesi($classroom);
        $this->createDepInformaticaDAMCurs2MP14FCT($classroom);
    }

    private function createDepInformaticaDAMCurs2MP2(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP3(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP5(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP6(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP7(Classroom $classroom)
    {
        $mp = new Module();
        $mp->name =  "Desenvolupament d'interfícies";
        //TODO alternative names, codes,etc

        $speciality507 = new Speciality();
        $speciality507->name = "Superior";
        $speciality507->code = "507";

        $course2 = new Course();
        $course2->name = "Curs 2 DAM";
        $course2->save();

        $period = new Period();
        $period->name="2016-17";
        $period->save();

        $uf1 =  new Submodule();
        $uf1->name = "Disseny i implementació d'interfícies";
        //TODO alternative names, codes,etc
        $uf1->total_hours = 50;
        $uf1->week_hours = 3;
        $uf1->start_date = Carbon::createFromDate(2016,9,13);
        $uf1->end_date = Carbon::createFromDate(2016,12,13);

        $uf1->modules()->save($mp);
        $uf1->classrooms()->save($classroom);
        $uf1->courses()->save($course2);
        $uf1->specialities()->save($speciality507);
        $uf1->periods()->save($period);
        $uf1->save();

        $uf2 =  new Submodule();
        $uf2->name = "Preparació i distribució d'aplicacions";
        $uf2->total_hours = 50;
        $uf2->week_hours = 3;
        $uf2->start_date = Carbon::createFromDate(2016,12,14);
        $uf2->end_date = Carbon::createFromDate(2017,02,10);
        $uf2->modules()->save($mp);
        $uf2->classrooms()->save($classroom);
        $uf1->courses()->save($course2);
        $uf2->specialities()->save($speciality507);
        $uf2->periods()->save($period);
        $uf2->save();

        /*
         *
         use HasSpecialities,
        HasModules,
        HasClassrooms, HasPeriods,
        HasCourses;



         *
         */

    }

    private function createDepInformaticaDAMCurs2MP8(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP9(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP10(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP13Sintesi(Classroom $classroom)
    {
    }

    private function createDepInformaticaDAMCurs2MP14FCT(Classroom $classroom)
    {
    }

    private function createDepInformaticaASIX()
    {

    }

    private function createDepInformaticaSMX()
    {

    }



}
