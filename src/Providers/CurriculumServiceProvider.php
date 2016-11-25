<?php

namespace Scool\Curriculum\Providers;

use Acacha\Names\Providers\NamesServiceProvider;
use Illuminate\Support\ServiceProvider;
use Scool\Curriculum\ScoolCurriculum;

/**
 * Class CurriculumServiceProvider.
 *
 * @package Scool\Curriculum\Providers
 */
class CurriculumServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     */
    public function register()
    {
        if (!defined('SCOOL_CURRICULUM_PATH')) {
            define('SCOOL_CURRICULUM_PATH', realpath(__DIR__.'/../../'));
        }
        $this->app->register(NamesServiceProvider::class);
    }

    /**
     * Bootstrap package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrations();
        $this->publishFactories();
        $this->publishConfig();
        $this->publishTests();
    }

    /**
     * Load migrations.
     */
    private function loadMigrations()
    {
        $this->loadMigrationsFrom(SCOOL_CURRICULUM_PATH . '/database/migrations');
    }

    /**
     * Publish factories.
     */
    private function publishFactories()
    {
        $this->publishes(
            ScoolCurriculum::factories(),"scool_curriculum"
        );
    }

    /**
     * Publish config.
     */
    private function publishConfig() {
        $this->publishes(
            ScoolCurriculum::configs(),"scool_curriculum"
        );
        $this->mergeConfigFrom(
            SCOOL_CURRICULUM_PATH . '/config/curriculum.php', 'scool_curriculum'
        );
    }

    private function publishTests()
    {
        $this->publishes(
               [SCOOL_CURRICULUM_PATH .'/tests/CurriculumTest.php' => 'tests/CurriculumTest.php'] ,
               'scool_curriculum'
        );
    }
}