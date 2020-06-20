<?php

namespace App\Observers;

use App\Jobs\ProcessarPlanilhaResiduos;
use App\Residuos;

class ResiduosObserver
{
    /**
     * Handle the residuos "created" event.
     *
     * @param Residuos $residuos
     * @return void
     */
    public function created(Residuos $residuos)
    {
        // PROCESSA PLANILHA DE RESIDUOS
        ProcessarPlanilhaResiduos::dispatch($residuos);
    }

    /**
     * Handle the residuos "updated" event.
     *
     * @param Residuos $residuos
     * @return void
     */
    public function updated(Residuos $residuos)
    {
        //
    }

    /**
     * Handle the residuos "deleted" event.
     *
     * @param Residuos $residuos
     * @return void
     */
    public function deleted(Residuos $residuos)
    {
        //
    }

    /**
     * Handle the residuos "restored" event.
     *
     * @param Residuos $residuos
     * @return void
     */
    public function restored(Residuos $residuos)
    {
        //
    }

    /**
     * Handle the residuos "force deleted" event.
     *
     * @param Residuos $residuos
     * @return void
     */
    public function forceDeleted(Residuos $residuos)
    {
        //
    }
}
