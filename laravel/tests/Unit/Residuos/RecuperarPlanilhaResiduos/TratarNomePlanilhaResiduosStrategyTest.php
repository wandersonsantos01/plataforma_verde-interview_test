<?php

use App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Strategy\TrataNomePlanilhaResiduosStrategy;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\ResultadoNavegacao;
use PHPUnit\Framework\TestCase;

/**
 * Class TratarNomePlanilhaResiduosStrategyTest
 * @group TratarNomePlanilhaResiduosStrategyTest
 */
class TratarNomePlanilhaResiduosStrategyTest extends TestCase
{

    public function testNomePlanilhaValido()
    {
        $nomePlanilha = 'teste123.xl';

        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $strategy = new TrataNomePlanilhaResiduosStrategy();
        $strategy->executar($nomePlanilha, $contexto);

        parent::assertEquals(false, $contexto->getSuspenderNavegacao());
        parent::assertCount(3, $contexto->getResultadoNavegacao()->getResultado());
        parent::assertEquals($nomePlanilha, $contexto->getResultadoNavegacao()->getResultado()[0]);
        parent::assertEquals('teste123.xls', $contexto->getResultadoNavegacao()->getResultado()[1]);
        parent::assertEquals('teste123.xlsx', $contexto->getResultadoNavegacao()->getResultado()[2]);
    }

}
