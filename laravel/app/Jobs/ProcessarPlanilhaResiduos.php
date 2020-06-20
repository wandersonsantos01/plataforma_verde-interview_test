<?php

namespace App\Jobs;

use App\Http\Controllers\ResiduosController;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Residuos\ProcessarResiduo\Factory\ProcessarResiduoNavegacaoFactory;
use App\Navegacao\Residuos\ProcessarResiduo\Strategy\ProcessarResiduoStrategy;
use App\Navegacao\ResultadoNavegacao;
use App\Residuos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessarPlanilhaResiduos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $residuo;

    /**
     * Create a new job instance.
     *
     * @param Residuos $residuo
     */
    public function __construct(Residuos $residuo)
    {
        $this->residuo = $residuo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $residuoController = new ProcessarResiduoNavegacaoFactory(new ProcessarResiduoStrategy);

        $contextoNavegacao = new ContextoNavegacao();
        $contextoNavegacao->setResultadoNavegacao(new ResultadoNavegacao());

        $navegacao = $residuoController->construir();
        $navegacao->navegar($this->residuo, $contextoNavegacao);
    }
}
