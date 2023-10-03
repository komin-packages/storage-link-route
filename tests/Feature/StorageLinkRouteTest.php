<?php

namespace Komin\StorageLinkRoute\Tests\Feature;

use Illuminate\Filesystem\Filesystem;
use Komin\StorageLinkRoute\Tests\TestCase;

class StorageLinkRouteTest extends TestCase
{
    /**
     * @test
     */
    public function can_create_the_storage_link_from_a_route()
    {
        $this->withoutExceptionHandling();

        $spy = $this->spy(Filesystem::class);

        $this->get('storage-link')->assertSuccessful();
        $this->get('storage-link')->assertSee("The [public/storage] directory has been linked.");

        $spy->shouldHaveReceived('link')->with(storage_path('app/public'), public_path('storage'));
        $spy->shouldHaveReceived('exists')->with(public_path('storage'));
    }


    /**
     * @test
     */
    public function cannot_try_to_create_the_storage_link_twice()
    {
        $this->mock(Filesystem::class)->shouldReceive('exists')->andReturn(true);
        $this->get('storage-link')->assertSee("The [public/storage] directory already exists");

    }
}