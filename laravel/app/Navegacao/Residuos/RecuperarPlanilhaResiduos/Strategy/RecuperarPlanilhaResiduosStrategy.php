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

        $resultado = Residuos::where('status', 'pendente')->whereIn('planilha', $arrNomePlanilha);

        if ($resultado->first() != null) {

            $resultado = [
                "planilha_processada" => false,
                "mensagem" => "Planilha não processada",
                "total_residuos_pendentes" => $resultado->count()
            ];
        } else {
            $processado = Residuos::where('status', 'processado')->whereIn('planilha', $arrNomePlanilha);
            $resultado = [
                "planilha_processada" => true,
                "mensagem" => "Planilha processada",
                "nome_planilha" => $processado->first()['planilha'],
                "total_residuos_processados" => $processado->count()
            ];
        }

        $contextoNavegacao->getResultadoNavegacao()->setResultado($resultado);
    }
}
