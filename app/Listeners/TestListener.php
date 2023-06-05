<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Models\AdminCategory;
use App\Models\Vendor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TestListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {


        AdminCategory::create(['title_en'=>$event->name]);
    }
}
