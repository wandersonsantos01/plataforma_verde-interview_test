<?php


namespace App\Navegacao\Residuos\ProcessarResiduo\Factory;


use App\Navegacao\Factory\AbstractFactory;
use App\Navegacao\Residuos\ProcessarResiduo\Strategy\ProcessarResiduoStrategy;

class ProcessarResiduoFactory extends AbstractFactory
{
    public function __construct(
        ProcessarResiduoStrategy $processarResiduoStrategy
    ) {
        parent::__construct([
            $processarResiduoStrategy
        ]);
    }
}
