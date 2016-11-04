<?php

namespace Scool\Curriculum;

class ScoolCurriculum
{
    public static function factories()
    {
        return [
            SCOOL_CURRICULUM_PATH . '/database/factories/ClassroomFactory.php' =>
                database_path('/factories/ClassroomFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/DepartmentFactory.php' =>
                database_path('/factories/DepartmentFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/SpecialityFactory.php' =>
                database_path('/factories/SpecialityFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudyCycleFactory.php' =>
                database_path('/factories/StudyCycleFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudyCycleFactory.php' =>
                database_path('/factories/StudyCycleFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudyFactory.php' =>
                database_path('/factories/StudyFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudyLawFactory.php' =>
                database_path('/factories/StudyLawFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudyModuleFactory.php' =>
                database_path('/factories/StudyModuleFactory.php'),
            SCOOL_CURRICULUM_PATH . '/database/factories/StudySubModuleFactory.php' =>
                database_path('/factories/StudySubModuleFactory.php'),
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