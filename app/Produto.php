<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function fotoPrincipal(){
        $foto = \App\ProdutoFoto::where('prod_id', '=', $this->id)->first();
        if ($foto) {
            return $foto->arquivo;
        }
    }

    public function fotos(){
        $fotos = \App\ProdutoFoto::where('prod_id', '=', $this->id)->get();
        $arr = [];
        if ($fotos) {
            foreach ($fotos as $foto) {
                array_push($arr, $foto->arquivo);
            }
            return $arr;
        }
    }
}
