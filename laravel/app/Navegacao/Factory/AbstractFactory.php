<?php

namespace App\Navegacao\Factory;

use App\Navegacao\Navegador;

abstract class AbstractFactory implements IFactory {

    protected $navegador;
    protected $acoes;

    protected function __construct($acoes) {
        $this->navegador = new Navegador();
        $this->acoes = $acoes;
    }
    public function construir() {
        $this->navegador->setAcoes($this->acoes);
        return $this->navegador;
    }
}

