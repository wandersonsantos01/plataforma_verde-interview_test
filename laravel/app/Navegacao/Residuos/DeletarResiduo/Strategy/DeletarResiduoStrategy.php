<?php


namespace App\Navegacao\Residuos\DeletarResiduo\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;

class DeletarResiduoStrategy implements IStrategy
{
    public function executar($residuo, ContextoNavegacao $contextoNavegacao)
    {
        $residuo = $contextoNavegacao->getResultadoNavegacao()->getResultado();
        $residuo->delete();
    }
}
