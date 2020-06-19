<?php

namespace App\Navegacao;

class Navegador {
    private $acoes = [];

    public function getAcoes() {
        return $this->acoes;
    }
      
    public function setAcoes($acoes) {
        $this->acoes = $acoes;
    }

    public function navegar($dominio, ContextoNavegacao $contextoNavegacao = null) {
        if($contextoNavegacao == null) {
            $contextoNavegacao = new ContextoNavegacao();
            $contextoNavegacao->setResultadoNavegacao(new ResultadoNavegacao());
        }

        foreach ($this->acoes as $acao) {
            if($contextoNavegacao->getSuspenderNavegacao())
                return $contextoNavegacao->getResultadoNavegacao(); 

            $acao->executar($dominio, $contextoNavegacao);
        }

        return $contextoNavegacao->getResultadoNavegacao();
    }
}
