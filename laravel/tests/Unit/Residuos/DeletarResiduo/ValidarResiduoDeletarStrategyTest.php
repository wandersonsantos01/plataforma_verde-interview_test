<?php

use App\Navegacao\Residuos\DeletarResiduo\Strategy\ValidarResiduoStrategy;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\ResultadoNavegacao;
use PHPUnit\Framework\TestCase;

/**
 * Class ValidarResiduoDeletarStrategyTest
 * @group ValidarResiduoDeletarStrategyTest
 */
class ValidarResiduoDeletarStrategyTest extends TestCase
{

    public function testResiduoInvalido()
    {
        $idResiduo = null;

        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $strategy = new ValidarResiduoStrategy();
        $strategy->executar($idResiduo, $contexto);

        parent::assertEquals(true, $contexto->getSuspenderNavegacao());
        parent::assertEquals('Resíduo não encontrado', $contexto->getResultadoNavegacao()->getMensagens()[0]->getTexto());
    }

}
