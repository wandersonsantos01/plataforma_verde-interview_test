<?php


namespace App\Navegacao\Residuos\CarregarPlanilhaResiduos\Factory;


use App\Navegacao\Factory\AbstractFactory;
use  App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy\ValidarPlanilhaResiduosStrategy;
use  App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy\ConverterPlanilhaResiduosStrategy;
use  App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy\SalvarResiduosStrategy;

class CarregarPlanilhaResiduosNavegacaoFactory extends AbstractFactory
{
    public function __construct(
        ValidarPlanilhaResiduosStrategy $validarPlanilhaResiduosStrategy,
        ConverterPlanilhaResiduosStrategy $converterPlanilhaResiduosStrategy,
        SalvarResiduosStrategy $salvarResiduosStrategy
    )
    {
        parent::__construct([
            $validarPlanilhaResiduosStrategy,
            $converterPlanilhaResiduosStrategy,
            $salvarResiduosStrategy
        ]);
    }
}
