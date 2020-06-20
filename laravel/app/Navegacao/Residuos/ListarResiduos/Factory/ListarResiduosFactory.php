<?php


namespace App\Navegacao\Residuos\ListarResiduos\Factory;


use App\Navegacao\Factory\AbstractFactory;
use App\Navegacao\Residuos\ListarResiduos\Strategy\ListarResiduosStrategy;

class ListarResiduosFactory extends AbstractFactory
{
    public function __construct(
        ListarResiduosStrategy $listarResiduosStrategy
    )
    {
        parent::__construct([
            $listarResiduosStrategy
        ]);
    }
}
