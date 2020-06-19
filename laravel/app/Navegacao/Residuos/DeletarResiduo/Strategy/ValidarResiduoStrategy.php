<?php


namespace App\Navegacao\Residuos\DeletarResiduo\Strategy;


use App\Enums\CriticidadeEnum;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class ValidarResiduoStrategy implements IStrategy
{
    public function executar($idResiduo, ContextoNavegacao $contextoNavegacao)
    {
        $registro = Residuos::where('_id', $idResiduo)->first();

        if ($registro == null) {
            $contextoNavegacao->setSuspenderNavegacao(true);
            $contextoNavegacao->getResultadoNavegacao()->adicionaMensagem(
                'Resíduo não encontrado',
                CriticidadeEnum::MEDIA
            );
        }

        $contextoNavegacao->getResultadoNavegacao()->setResultado($registro);
    }
}
