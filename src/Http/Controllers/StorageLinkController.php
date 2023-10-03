<?php

namespace Komin\StorageLinkRoute\Http\Controllers;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class StorageLinkController
{
    public function __invoke(Filesystem $filesystem)
    {
        if ($filesystem->exists(public_path('storage'))) {
            return 'The [public/storage] directory already exists';
        }

        $filesystem->link(storage_path('app/public'), public_path('storage'));

        return "The [public/storage] directory has been linked.";
    }
}