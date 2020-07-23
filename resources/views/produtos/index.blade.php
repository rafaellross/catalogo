@extends('layouts.app')

@section('content')

<div class="container">
    <h2 style="text-align: center;">Produtos</h2>
    <hr/>
    <div class="form-group row">
        <div class="col-md-12 col-lg-12 col-12">
            <a href="{{ URL::to('/produtos/create') }}" class="btn btn-primary">Adicionar Novo</a>
        </div>

    </div>
    <div class="container">
    <div class="row">
        @foreach ($produtos as $produto)
            <div class="col-md-3 col-sm-12 mt-3">
                <div class="card">
                    <img src="/images/{{$produto->fotoPrincipal()}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->titulo}}</h5>
                            <p class="card-text">{{$produto->descricao}}</p>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <a href="/produtos/{{ $produto->id}}" class="card-link btn btn-primary btn-block">Visualizar</a>
                        </div>
                        <div>
                            <a href="/produtos/{{ $produto->id}}/edit" class="card-link btn btn-info btn-block">Editar</a>
                        </div>
                        <form method="POST" action="/produtos/{{$produto->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-produto btn-block mt-3" value="Apagar Produto">
                            </div>
                        </form>
                </div>

                </div>
            </div>
        @endforeach

    </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.delete-produto').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Tem certeza que deseja apagar este produto?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

});
</script>
@endsection