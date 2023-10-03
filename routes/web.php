<?php

use Illuminate\Support\Facades\Route;
use Komin\StorageLinkRoute\Http\Controllers\StorageLinkController;

Route::get('storage-link', StorageLinkController::class);
