<?php


namespace App\Navegacao\Residuos\ListarResiduos\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class ListarResiduosStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $resultado = Residuos::all();

        $contextoNavegacao->getResultadoNavegacao()->setResultado($resultado);
    }
}
