<?php


namespace App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class TrataNomePlanilhaResiduosStrategy implements IStrategy
{
    public function executar($nomePlanilha, ContextoNavegacao $contextoNavegacao)
    {
        $expNomePlanilha = explode('.', $nomePlanilha);
        $nomePlanilhaSemExt = str_replace('.' . end($expNomePlanilha), '', $nomePlanilha);

        $arrNomePlanilha = array_unique([
            $nomePlanilha,
            $nomePlanilhaSemExt . '.xls',
            $nomePlanilhaSemExt . '.xlsx'
        ]);

        $contextoNavegacao->getResultadoNavegacao()->setResultado($arrNomePlanilha);
    }
}
