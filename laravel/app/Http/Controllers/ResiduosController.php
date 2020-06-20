<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController;

use App\Navegacao\Residuos\CarregarPlanilhaResiduos\Factory\CarregarPlanilhaResiduosNavegacaoFactory;
use App\Navegacao\Residuos\ListarResiduos\Factory\ListarResiduosNavegacaoFactory;
use App\Navegacao\Residuos\EditarResiduo\Factory\EditarResiduoNavegacaoFactory;
use App\Navegacao\Residuos\DeletarResiduo\Factory\DeletarResiduoNavegacaoFactory;
use App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Factory\RecuperarPlanilhaResiduosNavegacaoFactory;

use App\Navegacao\Residuos\ProcessarResiduo\Factory\ProcessarResiduoNavegacaoFactory;
use App\Residuos;
use Illuminate\Http\Request;


class ResiduosController extends AbstractController
{
    private $carregarPlanilhaResiduosNavegacaoFactory;
    private $listarResiduosNavegacaoFactory;
    private $editarResiduoNavegacaoFactory;
    private $deletarResiduoNavegacaoFactory;
    private $recuperarPlanilhaResiduosNavegacaoFactory;

    private $processarResiduoNavegacaoFactory;

    public function __construct(
        CarregarPlanilhaResiduosNavegacaoFactory $carregarPlanilhaResiduosNavegacaoFactory,
        ListarResiduosNavegacaoFactory $listarResiduosNavegacaoFactory,
        EditarResiduoNavegacaoFactory $editarResiduoNavegacaoFactory,
        DeletarResiduoNavegacaoFactory $deletarResiduoNavegacaoFactory,
        RecuperarPlanilhaResiduosNavegacaoFactory $recuperarPlanilhaResiduosNavegacaoFactory,

        ProcessarResiduoNavegacaoFactory $processarResiduoNavegacaoFactory
    )
    {
        $this->carregarPlanilhaResiduosNavegacaoFactory = $carregarPlanilhaResiduosNavegacaoFactory;
        $this->listarResiduosNavegacaoFactory = $listarResiduosNavegacaoFactory;
        $this->editarResiduoNavegacaoFactory = $editarResiduoNavegacaoFactory;
        $this->deletarResiduoNavegacaoFactory = $deletarResiduoNavegacaoFactory;
        $this->recuperarPlanilhaResiduosNavegacaoFactory = $recuperarPlanilhaResiduosNavegacaoFactory;

        $this->processarResiduoNavegacaoFactory = $processarResiduoNavegacaoFactory;
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

    public function update($idResiduo, Request $request)
    {
        $request->request->add(["_id" => $idResiduo]);
        $contexto = parent::executarNavegacao($request, $this->editarResiduoNavegacaoFactory);

        if ($contexto->getSuspenderNavegacao()) {
            return parent::retornoComErro($contexto->getResultadoNavegacao()->getMensagens(), 400);
        }

        $retorno = [
            "success" => true
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

    public function processarResiduos(Residuos $residuo){
        $contexto = parent::executarNavegacao($residuo, $this->processarResiduoNavegacaoFactory);

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
