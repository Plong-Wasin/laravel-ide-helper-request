<?php

namespace Wasinpwg\LaravelIdeHelperExtended\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Wasinpwg\LaravelIdeHelperExtended\LaravelIdeHelperExtendedServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelIdeHelperExtendedServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-ide-helper-extended_table.php.stub';
        $migration->up();
        */
    }
}
