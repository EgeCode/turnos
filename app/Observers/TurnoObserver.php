<?php

namespace App\Observers;

use App\Models\Turno;

class TurnoObserver
{

/**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */


    /**
     * Handle the Turno "created" event.
     *
     * @param  \App\Models\Turno  $turno
     * @return void
     */
    public function created(Turno $turno)
    {
        //

    }

    /**
     * Handle the Turno "updated" event.
     *
     * @param  \App\Models\Turno  $turno
     * @return void
     */
    public function updated(Turno $turno)
    {
        //
              dd($turno);
    }

    /**
     * Handle the Turno "deleted" event.
     *
     * @param  \App\Models\Turno  $turno
     * @return void
     */
    public function deleted(Turno $turno)
    {
        //
    }

    /**
     * Handle the Turno "restored" event.
     *
     * @param  \App\Models\Turno  $turno
     * @return void
     */
    public function restored(Turno $turno)
    {
        //
    }

    /**
     * Handle the Turno "force deleted" event.
     *
     * @param  \App\Models\Turno  $turno
     * @return void
     */
    public function forceDeleted(Turno $turno)
    {
        //
    }
}
