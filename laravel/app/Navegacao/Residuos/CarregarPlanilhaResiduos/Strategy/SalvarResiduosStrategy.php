<?php


namespace App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy;


use App\Enums\CriticidadeEnum;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;
use Illuminate\Support\Str;

class SalvarResiduosStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $resultado = $contextoNavegacao->getResultadoNavegacao()->getResultado();

       foreach ($resultado['assoc'] as $key => $dados) {
           $residuo = new Residuos();
           $residuo->nome = $dados['nomeComumDoResiduo'];
           $residuo->tipo = $dados['tipoDeResiduo'];
           $residuo->categoria = $dados['categoria'];
           $residuo->tecnologia_tratamento = $dados['tecnologiaDeTratamento'];
           $residuo->classe = $dados['classe'];
           $residuo->unidadeDeMedida = $dados['unidadeDeMedida'];
           $residuo->peso = $dados['peso'];
           $residuo->save();
       }
    }
}
