<?php


namespace App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use Illuminate\Support\Str;

class ConverterPlanilhaResiduosStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $sheetData = $contextoNavegacao->getResultadoNavegacao()->getResultado();

        $defCabecalho = false;
        $defConteudo = false;
        $cabecalho = [];
        $conteudo = [];
        $assoc = [];
        $keyAssoc = 0;
        foreach ($sheetData as $rows => $k) {
            foreach ($k as $key => $value) {
                if (!is_null($value)) {
                    if (!$defCabecalho) {
                        $cabecalho[$key] = $value;
                    } else {
                        $sanitizeKey = Str::camel(Str::ascii($cabecalho[$key]));
                        $conteudo[$rows][$key] = $value;
                        $assoc[$keyAssoc][$sanitizeKey] = $value;
                        $defConteudo = true;
                    }
                }
            }
            if (!empty($cabecalho)) {
                $defCabecalho = true;
            }
            if ($defConteudo) {
                $keyAssoc++;
            }
        }

        $dados['assoc'] = $assoc;
        $dados['cabecalho'] = $cabecalho;
        $dados['conteudo'] = $conteudo;

        $contextoNavegacao->getResultadoNavegacao()->setResultado($dados);
    }
}
