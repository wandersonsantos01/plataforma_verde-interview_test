<?php


namespace App\Navegacao\Residuos\CarregarPlanilhaResiduos\Strategy;


use App\Enums\CriticidadeEnum;
use App\Navegacao\ContextoNavegacao;
use App\Navegacao\Strategy\IStrategy;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ValidarPlanilhaResiduosStrategy implements IStrategy
{
    public function executar($request, ContextoNavegacao $contextoNavegacao)
    {
        $sheetData = null;
        if ($request instanceof Request) {
            $spreadsheet = IOFactory::load($request->planilha);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            if (!is_array($sheetData)) {
                $contextoNavegacao->setSuspenderNavegacao(true);
                $contextoNavegacao->getResultadoNavegacao()->adicionaMensagem(
                    'Planilha vazia',
                    CriticidadeEnum::MEDIA
                );
            }
        } else {
            $contextoNavegacao->setSuspenderNavegacao(true);
            $contextoNavegacao->getResultadoNavegacao()->adicionaMensagem(
                'Planilha inválida',
                CriticidadeEnum::MEDIA
            );
        }

        $contextoNavegacao->getResultadoNavegacao()->setResultado($sheetData);
    }

}
