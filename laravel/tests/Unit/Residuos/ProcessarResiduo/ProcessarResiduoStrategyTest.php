<?php

use App\Navegacao\Residuos\ProcessarResiduo\Strategy\ProcessarResiduoStrategy;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\ResultadoNavegacao;
use PHPUnit\Framework\TestCase;

/**
 * Class ProcessarResiduoStrategyTest
 * @group ProcessarResiduoStrategyTest
 */
class ProcessarResiduoStrategyTest extends TestCase
{

    public function testResiduoInvalido()
    {
        $request = null;

        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $strategy = new ProcessarResiduoStrategy();
        $strategy->executar($request, $contexto);

        parent::assertEquals(false, $contexto->getSuspenderNavegacao());
    }

}
