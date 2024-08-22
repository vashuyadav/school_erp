<?php

namespace App\Observers;

use App\Models\Classes;

class ClassObserver
{
    /**
     * Handle the Classes "created" event.
     */
    public function created(Classes $classes): void
    {
        //
    }

    /**
     * Handle the Classes "updated" event.
     */
    public function updated(Classes $classes): void
    {
        dd("i am from class model observer after deleting record");
    }

    /**
     * Handle the Classes "deleted" event.
     */
    public function deleted(Classes $classes): void
    {
        //
    }

    /**
     * Handle the Classes "restored" event.
     */
    public function restored(Classes $classes): void
    {
        //
    }

    /**
     * Handle the Classes "force deleted" event.
     */
    public function forceDeleted(Classes $classes): void
    {
        //
    }
}
