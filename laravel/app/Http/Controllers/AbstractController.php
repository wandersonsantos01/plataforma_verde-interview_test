<?php


namespace App\Http\Controllers;


use App\Navegacao\ContextoNavegacao;
use App\Navegacao\MensagemNavegacao;
use App\Navegacao\ResultadoNavegacao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class AbstractController extends Controller
{

    /**
     * @param MensagemNavegacao[] $retorno
     * @param $status
     * @return JsonResponse
     */
    public function retornoComErro($retorno, $status)
    {
        $mensagem = [];
        foreach ($retorno as $mensagemNavegacao) {
            $mensagem[] = $mensagemNavegacao->getTexto();
        }

        $resultado = [
            "success" => false,
            "erros" => $mensagem
        ];

        return response()->json($resultado, $status);
    }

    public function executarNavegacao($dominio, $navegacao)
    {
        $contexto = new ContextoNavegacao();
        $contexto->setResultadoNavegacao(new ResultadoNavegacao());

        $navegacao = $navegacao->construir();
        $navegacao->navegar($dominio, $contexto);

        return $contexto;
    }

}
