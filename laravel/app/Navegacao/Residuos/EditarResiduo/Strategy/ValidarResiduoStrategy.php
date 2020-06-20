<?php


namespace App\Navegacao\Residuos\EditarResiduo\Strategy;


use App\Enums\CriticidadeEnum;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class ValidarResiduoStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $registro = null;
        if ($request != null) {
            $registro = Residuos::where('_id', $request->_id)->first();
        }

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
