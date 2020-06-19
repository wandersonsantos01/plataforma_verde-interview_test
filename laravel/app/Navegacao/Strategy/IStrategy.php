<?php

namespace App\Navegacao\Strategy;

use App\Navegacao\ContextoNavegacao;

interface IStrategy {
    public function executar($dominio, ContextoNavegacao $contextoNavegacao);
}
