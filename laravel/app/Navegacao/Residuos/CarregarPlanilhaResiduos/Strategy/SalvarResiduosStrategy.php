<?php


namespace App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class SalvarResiduosStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $resultado = $contextoNavegacao->getResultadoNavegacao()->getResultado();

        foreach ($resultado['assoc'] as $key => $dados) {
            $residuo = new Residuos();
            $residuo->planilha = $request->planilha->getClientOriginalName();
            $residuo->status = "pendente";
            $residuo->nome = $dados['nomeComumDoResiduo'];
            $residuo->tipo = $dados['tipoDeResiduo'];
            $residuo->categoria = $dados['categoria'];
            $residuo->tecnologia_tratamento = $dados['tecnologiaDeTratamento'];
            $residuo->classe = $dados['classe'];
            $residuo->unidade_medida = $dados['unidadeDeMedida'];
            $residuo->peso = $dados['peso'];
            $residuo->save();
        }
    }
}
