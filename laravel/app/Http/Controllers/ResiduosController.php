<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AbstractController;

use App\Navegacao\Residuos\CarregarPlanilhaResiduos\Factory\CarregarPlanilhaResiduosFactory;
use App\Navegacao\Residuos\ListarResiduos\Factory\ListarResiduosFactory;
use App\Navegacao\Residuos\EditarResiduo\Factory\EditarResiduoFactory;
use App\Navegacao\Residuos\DeletarResiduo\Factory\DeletarResiduoFactory;
use App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Factory\RecuperarPlanilhaResiduosFactory;

use App\Navegacao\Residuos\ProcessarResiduo\Factory\ProcessarResiduoFactory;
use App\Residuos;
use Illuminate\Http\Request;


class ResiduosController extends AbstractController
{
    private $carregarPlanilhaResiduosFactory;
    private $listarResiduosFactory;
    private $editarResiduoFactory;
    private $deletarResiduoFactory;
    private $recuperarPlanilhaResiduosFactory;

    private $processarResiduoFactory;

    public function __construct(
        CarregarPlanilhaResiduosFactory $carregarPlanilhaResiduosFactory,
        ListarResiduosFactory $listarResiduosFactory,
        EditarResiduoFactory $editarResiduoFactory,
        DeletarResiduoFactory $deletarResiduoFactory,
        RecuperarPlanilhaResiduosFactory $recuperarPlanilhaResiduosFactory,

        ProcessarResiduoFactory $processarResiduoFactory
    )
    {
        $this->carregarPlanilhaResiduosFactory = $carregarPlanilhaResiduosFactory;
        $this->listarResiduosFactory = $listarResiduosFactory;
        $this->editarResiduoFactory = $editarResiduoFactory;
        $this->deletarResiduoFactory = $deletarResiduoFactory;
        $this->recuperarPlanilhaResiduosFactory = $recuperarPlanilhaResiduosFactory;

        $this->processarResiduoFactory = $processarResiduoFactory;
    }

    public function store(Request $request)
    {
        $contexto = parent::executarNavegacao($request, $this->carregarPlanilhaResiduosFactory);

        if ($contexto->getSuspenderNavegacao()) {
            return parent::retornoComErro($contexto->getResultadoNavegacao()->getMensagens(), 400);
        }

        $retorno = [
            "success" => true,
            "data" => $contexto->getResultadoNavegacao()->getResultado()
        ];
        return response()->json($retorno);
    }

    public function show(Request $request)
    {
        $contexto = parent::executarNavegacao($request, $this->listarResiduosFactory);

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
        $contexto = parent::executarNavegacao($request, $this->editarResiduoFactory);

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
        $contexto = parent::executarNavegacao($idResiduo, $this->deletarResiduoFactory);

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
        $contexto = parent::executarNavegacao($nomePlanilha, $this->recuperarPlanilhaResiduosFactory);

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
        $contexto = parent::executarNavegacao($residuo, $this->processarResiduoFactory);

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
