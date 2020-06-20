<?php


namespace App\Navegacao\Residuos\EditarResiduo\Factory;


use App\Navegacao\Factory\AbstractFactory;
use App\Navegacao\Residuos\EditarResiduo\Strategy\ValidarResiduoStrategy;
use App\Navegacao\Residuos\EditarResiduo\Strategy\EditarResiduoStrategy;

class EditarResiduoFactory extends AbstractFactory
{
    public function __construct(
        ValidarResiduoStrategy $validarResiduoStrategy,
        EditarResiduoStrategy $editarResiduoStrategy
    )
    {
        parent::__construct([
            $validarResiduoStrategy,
            $editarResiduoStrategy
        ]);
    }
}
