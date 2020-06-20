<?php

use App\Navegacao\Residuos\ListarResiduos\Strategy\ListarResiduosStrategy;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\ResultadoNavegacao;
use PHPUnit\Framework\TestCase;

/**
 * Class ListarResiduosStrategyTest
 * @group ListarResiduosStrategyTest
 */
class ListarResiduosStrategyTest extends TestCase
{

    public function testResiduoInvalido()
    {
        $request = null;

        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $strategy = new ListarResiduosStrategy();
        $strategy->executar($request, $contexto);

        parent::assertEquals(false, $contexto->getSuspenderNavegacao());
        parent::assertEquals(null, $contexto->getResultadoNavegacao()->getResultado());
    }

}
