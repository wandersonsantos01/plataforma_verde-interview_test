<?php

namespace App\Navegacao\Strategy;
use App\Navegacao\ContextoNavegacao;

abstract class AbstractStrategy implements IStrategy {
    public abstract function executar($dominio, ContextoNavegacao $contextoNavegacao);

    /**
     * @param ContextoNavegacao $contextoNavegacao
     * @param ContextoNavegacao $contextoSubNavegacao
     */
    public function propagarResultadoSubNavegacao(&$contextoNavegacao, $contextoSubNavegacao)
    {
        $contextoNavegacao->setSuspenderNavegacao($contextoSubNavegacao->getSuspenderNavegacao());

        foreach ($contextoSubNavegacao->getResultadoNavegacao()->getMensagens() as $mensagem)
            $contextoNavegacao->getResultadoNavegacao()->adicionaMensagem($mensagem->getTexto(), $mensagem->getCriticidade());
    }
}
