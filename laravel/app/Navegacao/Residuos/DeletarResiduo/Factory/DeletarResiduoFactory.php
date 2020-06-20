<?php


namespace App\Navegacao\Residuos\DeletarResiduo\Factory;


use App\Navegacao\Factory\AbstractFactory;
use App\Navegacao\Residuos\DeletarResiduo\Strategy\ValidarResiduoStrategy;
use App\Navegacao\Residuos\DeletarResiduo\Strategy\DeletarResiduoStrategy;

class DeletarResiduoFactory extends AbstractFactory
{
    public function __construct(
        ValidarResiduoStrategy $validarResiduoStrategy,
        DeletarResiduoStrategy $deletarResiduoStrategy
    )
    {
        parent::__construct([
            $validarResiduoStrategy,
            $deletarResiduoStrategy
        ]);
    }
}
