<?php

use Illuminate\Database\Seeder;

class ResiduosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Residuos::create([
            [
                'planilha' => 'planilha_teste.xlsx',
                'nome' => 'Teste Nome',
                'tipo' => 'Teste Tipo',
                'categoria' => 'Teste Categoria',
                'tecnologia_tratamento' => 'Teste Tecnologia Tratamento',
                'classe' => 'Teste Classe',
                'unidade_medida' => 'Teste Unidade Medida',
                'peso' => 100
            ]
        ]);
    }
}
