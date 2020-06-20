<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController;

use App\Navegacao\Residuos\CarregarPlanilhaResiduos\Factory\CarregarPlanilhaResiduosNavegacaoFactory;
use App\Navegacao\Residuos\ListarResiduos\Factory\ListarResiduosNavegacaoFactory;
use App\Navegacao\Residuos\DeletarResiduo\Factory\DeletarResiduoNavegacaoFactory;
use App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Factory\RecuperarPlanilhaResiduosNavegacaoFactory;
use Illuminate\Http\Request;


class ResiduosController extends AbstractController
{
    private $carregarPlanilhaResiduosNavegacaoFactory;
    private $listarResiduosNavegacaoFactory;
    private $deletarResiduoNavegacaoFactory;
    private $recuperarPlanilhaResiduoNavegacaoFactory;

    public function __construct(
        CarregarPlanilhaResiduosNavegacaoFactory $carregarPlanilhaResiduosNavegacaoFactory,
        ListarResiduosNavegacaoFactory $listarResiduosNavegacaoFactory,
        DeletarResiduoNavegacaoFactory $deletarResiduoNavegacaoFactory,
        RecuperarPlanilhaResiduosNavegacaoFactory $recuperarPlanilhaResiduosNavegacaoFactory
    )
    {
        $this->carregarPlanilhaResiduosNavegacaoFactory = $carregarPlanilhaResiduosNavegacaoFactory;
        $this->listarResiduosNavegacaoFactory = $listarResiduosNavegacaoFactory;
        $this->deletarResiduoNavegacaoFactory = $deletarResiduoNavegacaoFactory;
        $this->recuperarPlanilhaResiduosNavegacaoFactory = $recuperarPlanilhaResiduosNavegacaoFactory;
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

    public function show($nomeResiduo = '')
    {
        $contexto = parent::executarNavegacao($nomeResiduo, $this->listarResiduosNavegacaoFactory);

        if ($contexto->getSuspenderNavegacao()) {
            return parent::retornoComErro($contexto->getResultadoNavegacao()->getMensagens(), 400);
        }

        $retorno = [
            "success" => true,
            "data" => $contexto->getResultadoNavegacao()->getResultado()
        ];

        return response()->json($retorno);
    }

    public function destroy($idResiduo)
    {
        $contexto = parent::executarNavegacao($idResiduo, $this->deletarResiduoNavegacaoFactory);

        if ($contexto->getSuspenderNavegacao()) {
            return parent::retornoComErro($contexto->getResultadoNavegacao()->getMensagens(), 400);
        }

        $retorno = [
            "success" => true
        ];

        return response()->json($retorno);
    }

    public function showPlanilha($nomePlanilha)
    {
        $contexto = parent::executarNavegacao($nomePlanilha, $this->recuperarPlanilhaResiduosNavegacaoFactory);

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
