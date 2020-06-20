<?php

use App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy\ValidarPlanilhaResiduosStrategy;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\ResultadoNavegacao;
use PHPUnit\Framework\TestCase;

/**
 * Class ValidarPlanilhaResiduosStrategyTest
 * @group ValidarPlanilhaResiduosStrategyTest
 */
class ValidarPlanilhaResiduosStrategyTest extends TestCase
{

    public function testPlanilhaInvalida()
    {
        $request = null;

        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $strategy = new ValidarPlanilhaResiduosStrategy();
        $strategy->executar($request, $contexto);

        parent::assertEquals(true, $contexto->getSuspenderNavegacao());
        parent::assertEquals('Planilha inválida', $contexto->getResultadoNavegacao()->getMensagens()[0]->getTexto());
    }

}
