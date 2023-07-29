<?php

namespace Wasinpwg\LaravelIdeHelperExtended;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wasinpwg\LaravelIdeHelperExtended\Commands\LaravelIdeHelperFixCommand;
use Wasinpwg\LaravelIdeHelperExtended\Commands\LaravelIdeHelperRequestsCommand;

class LaravelIdeHelperExtendedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-ide-helper-extended')
            ->hasCommand(LaravelIdeHelperFixCommand::class)
            ->hasCommand(LaravelIdeHelperRequestsCommand::class);
    }
}
