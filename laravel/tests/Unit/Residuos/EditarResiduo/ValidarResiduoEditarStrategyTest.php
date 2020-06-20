<?php

use App\Navegacao\Residuos\EditarResiduo\Strategy\ValidarResiduoStrategy;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\ResultadoNavegacao;
use PHPUnit\Framework\TestCase;

/**
 * Class ValidarResiduoEditarStrategyTest
 * @group ValidarResiduoEditarStrategyTest
 */
class ValidarResiduoEditarStrategyTest extends TestCase
{

    public function testResiduoInvalido()
    {
        $request = null;

        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $strategy = new ValidarResiduoStrategy();
        $strategy->executar($request, $contexto);

        parent::assertEquals(true, $contexto->getSuspenderNavegacao());
        parent::assertEquals('Resíduo não encontrado', $contexto->getResultadoNavegacao()->getMensagens()[0]->getTexto());
    }

}
