<?php

namespace App\Navegacao;

class MensagemNavegacao implements \JsonSerializable{

    private $texto;
    private $criticidade;

    public function __construct($texto, $criticidade) {
        $this->texto = $texto;
        $this->criticidade = $criticidade;
    }

    public function getTexto() {
        return $this->texto;
    }
      
    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getCriticidade() {
        return $this->criticidade;
    }
      
    public function setCriticidade($criticidade) {
        $this->criticidade = $criticidade;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}