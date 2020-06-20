<?php


namespace App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Factory;


use App\Navegacao\Factory\AbstractFactory;
use App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Strategy\TrataNomePlanilhaResiduosStrategy;
use App\Navegacao\Residuos\RecuperarPlanilhaResiduos\Strategy\RecuperarPlanilhaResiduosStrategy;

class RecuperarPlanilhaResiduosFactory extends AbstractFactory
{
    public function __construct(
        TrataNomePlanilhaResiduosStrategy $trataNomePlanilhaResiduosStrategy,
        RecuperarPlanilhaResiduosStrategy $recuperarPlanilhaResiduosStrategy
    )
    {
        parent::__construct([
            $trataNomePlanilhaResiduosStrategy,
            $recuperarPlanilhaResiduosStrategy
        ]);
    }
}
