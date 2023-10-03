<?php

namespace Komin\StorageLinkRoute\Tests;

use Komin\StorageLinkRoute\StorageLinkRouteServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            StorageLinkRouteServiceProvider::class,
        ];
    }
}