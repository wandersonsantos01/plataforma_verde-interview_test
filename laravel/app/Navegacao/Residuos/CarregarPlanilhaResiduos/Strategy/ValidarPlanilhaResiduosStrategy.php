<?php


namespace App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy;


use App\Enums\CriticidadeEnum;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ValidarPlanilhaResiduosStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $spreadsheet = IOFactory::load($request->planilha);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        if (!is_array($sheetData)) {
            $contextoNavegacao->setSuspenderNavegacao(true);
            $contextoNavegacao->getResultadoNavegacao()->adicionaMensagem(
                'Planilha inválida ou vazia',
                CriticidadeEnum::MEDIA
            );
        }

        $contextoNavegacao->getResultadoNavegacao()->setResultado($sheetData);
    }

}
