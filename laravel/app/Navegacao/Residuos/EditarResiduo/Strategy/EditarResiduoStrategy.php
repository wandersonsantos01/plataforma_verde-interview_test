<?php


namespace App\Navegacao\Residuos\EditarResiduo\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use App\Residuos;

class EditarResiduoStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $fieldsUpdate = [
            "nome" => $request->nome,
            "tipo" => $request->tipo,
            "categoria" => $request->categoria,
            "tecnologia_tratamento" => $request->tecnologia_tratamento,
            "classe" => $request->classe,
            "unidade_medida" => $request->unidade_medida,
            "peso" => "100.5"
        ];
        Residuos::where('_id', $request->_id)
            ->update($fieldsUpdate);
    }
}
