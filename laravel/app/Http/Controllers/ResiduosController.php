<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController;

use App\Navegacao\Residuos\CarregarPlanilhaResiduos\Factory\CarregarPlanilhaResiduosNavegacaoFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;


class ResiduosController extends AbstractController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $carregarPlanilhaResiduosNavegacaoFactory;

    public function __construct(
        CarregarPlanilhaResiduosNavegacaoFactory $carregarPlanilhaResiduosNavegacaoFactory
    )
    {
        $this->carregarPlanilhaResiduosNavegacaoFactory = $carregarPlanilhaResiduosNavegacaoFactory;
    }

    public function store(Request $request)
    {
        $contexto = parent::executarNavegacao($request, $this->carregarPlanilhaResiduosNavegacaoFactory);

        if ($contexto->getSuspenderNavegacao()) {
            return parent::retornoComErro($contexto->getResultadoNavegacao()->getMensagens(), 400);
        }

        $retorno = [
            "success" => true,
            "data" => $contexto->getResultadoNavegacao()->getResultado()
        ];
        return response()->json($retorno);
    }

}
