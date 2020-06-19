<?php

namespace App\Navegacao;

class ResultadoNavegacao implements \JsonSerializable {

    private $mensagens;
    private $resultado;

    public function getResultado()
    {
        return $this->resultado;
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    public function __construct() {
        $this->mensagens = array();
    }

    /**
     * @return MensagemNavegacao[]
     */
    public function getMensagens() {
        return $this->mensagens;
    }

    public function setMensagens(array $mensagens) {
        $this->mensagens = $mensagens;
    }

    public function adicionaMensagem($texto, $criticidade) {
        array_push($this->mensagens, new MensagemNavegacao($texto, $criticidade));
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

}
