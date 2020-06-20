<?php


namespace App\Navegacao\Residuos\ProcessarResiduo\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;

class ProcessarResiduoStrategy implements IStrategy
{
    public function executar($residuo, ContextoNavegacao $contextoNavegacao)
    {
        $residuo->update(['status' => 'processado']);
    }
}
