<?php

namespace Scool\Curriculum;

class ScoolCurriculum
{
    public static function factories()
    {
        return [
            SCOOL_CURRICULUM_PATH . '/database/factories/ClassroomFactory.php' =>
                database_path('/factories/ClassroomFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/CycleFactory.php' =>
                database_path('/factories/CycleFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/DepartmentFactory.php' =>
                database_path('/factories/DepartmentFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/LawFactory.php' =>
                database_path('/factories/LawFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/ModuleFactory.php' =>
                database_path('/factories/ModuleFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/SpecialityFactory.php' =>
                database_path('/factories/SpecialityFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudyFactory.php' =>
                database_path('/factories/StudyFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/SubmoduleFactory.php' =>
                database_path('/factories/SubmoduleFactory.php'),
        ];
    }

    public static function configs()
    {
        return [
            SCOOL_CURRICULUM_PATH . '/config/curriculum.php' =>
                config_path('curriculum.php'),
        ];
    }
}