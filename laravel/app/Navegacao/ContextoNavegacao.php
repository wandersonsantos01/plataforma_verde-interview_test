<?php

namespace App\Navegacao;

class ContextoNavegacao
{
    private $resultadoNavegacao;
    private $suspenderNavegacao;

    public function getResultadoNavegacao(): ResultadoNavegacao
    {
        return $this->resultadoNavegacao;
    }

    public function setResultadoNavegacao(ResultadoNavegacao $resultadoNavegacao)
    {
        $this->resultadoNavegacao = $resultadoNavegacao;
    }

    public function getSuspenderNavegacao()
    {
        return $this->suspenderNavegacao;
    }

    public function setSuspenderNavegacao($suspenderNavegacao)
    {
        $this->suspenderNavegacao = $suspenderNavegacao;
    }
}
