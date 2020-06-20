<?php


namespace App\Navegacao\Residuos\ProcessarResiduo\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;

class ProcessarResiduoStrategy implements IStrategy
{
    public function executar($residuo, ContextoNavegacao $contextoNavegacao)
    {
        if ($residuo != null) {
            $residuo->update(['status' => 'processado']);
        }
    }
}
