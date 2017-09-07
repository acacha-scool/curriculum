<?php

namespace Scool\Curriculum\Providers;

use Acacha\Names\Providers\NamesServiceProvider;
use Acacha\Stateful\Providers\StatefulServiceProvider;
use Illuminate\Support\ServiceProvider;
use Scool\Curriculum\ScoolCurriculum;
use Scool\Curriculum\Stats\CacheableStatsRepository;
use Scool\Curriculum\Stats\Contracts\StatsRepository as StatsRepositoryInterface;
use Scool\Curriculum\Stats\StatsRepository;

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

        $this->registerStatefulEloquentServiceProvider();

        $this->bindRepositories();

        $this->app->bind(StatsRepositoryInterface::class,function() {
            return new CacheableStatsRepository(new StatsRepository());
        });

    }

    /**
     * Bind repositories
     */
    protected function bindRepositories()
    {
        $this->app->bind(
            \Scool\Curriculum\Repositories\StudyRepository::class,
            \Scool\Curriculum\Repositories\StudyRepositoryEloquent::class);
        $this->app->bind(\Scool\Curriculum\Repositories\TodoRepository::class, \Scool\Curriculum\Repositories\TodoRepositoryEloquent::class);
        $this->app->bind(\Scool\Curriculum\Repositories\ShitRepository::class, \Scool\Curriculum\Repositories\ShitRepositoryEloquent::class);
        //:end-bindings:
    }

    /**
     * Register acacha/stateful-eloquent Service Provider.
     *
     */
    protected function registerStatefulEloquentServiceProvider()
    {
        $this->app->register(StatefulServiceProvider::class);
    }

    /**
     * Bootstrap package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->defineRoutes();
        $this->loadMigrations();
        $this->loadViews();
        $this->publishFactories();
        $this->publishConfig();
        $this->publishTests();
    }

    /**
     * Define the curriculum routes.
     */
    protected function defineRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $router = app('router');

            $router->group(['namespace' => 'Scool\Curriculum\Http\Controllers'], function () {
                require __DIR__.'/../Http/routes.php';
            });

        }
    }

    /**
     * Load package views.
     */
    private function loadViews()
    {
        $this->loadViewsFrom(SCOOL_CURRICULUM_PATH . '/resources/views', 'curriculum');
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

    /**
     * Publich tests.
     */
    private function publishTests()
    {
        $this->publishes(
               [SCOOL_CURRICULUM_PATH .'/tests/CurriculumTest.php' => 'tests/CurriculumTest.php'] ,
               'scool_curriculum'
        );
    }


}