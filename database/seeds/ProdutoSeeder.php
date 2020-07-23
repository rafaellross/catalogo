<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            DB::table('produtos')->insert([
                'titulo' => Str::random(10),
                'descricao' => Str::random(30),
                'preco' => 180.00,
            ]);

        }
    }
}

/*
$table->string('titulo');
$table->string('descricao');
$table->float('preco');*/