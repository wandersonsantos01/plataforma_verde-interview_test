<?php


namespace App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class RecuperarPlanilhaResiduosStrategy implements IStrategy
{
    public function executar($nomePlanilha, ContextoNavegacao $contextoNavegacao)
    {
        $arrNomePlanilha = $contextoNavegacao->getResultadoNavegacao()->getResultado();

        $resultado = Residuos::whereIn('planilha', $arrNomePlanilha);

        if ($resultado->first() == null) {
            $resultado = [
                "planilha_processada" => false,
                "mensagem" => "Planilha não processada"
            ];
        } else {
            $resultado = [
                "planilha_processada" => true,
                "mensagem" => "Planilha processada",
                "nome_planilha" => $resultado->first()['planilha'],
                "total_residuos_planilha" => $resultado->count()
            ];
        }

        $contextoNavegacao->getResultadoNavegacao()->setResultado($resultado);
    }
}
