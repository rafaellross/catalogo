@extends('layouts.app')

@section('content')

<div class="container">
    <h2 style="text-align: center;">Categorias</h2>
    <hr/>
    <div class="form-group row">
        <div class="col-md-12 col-lg-12 col-12">
            <a href="{{ URL::to('/categorias/create') }}" class="btn btn-primary">Adicionar Nova Categoria</a>
        </div>
    </div>
    <div class="container">
    <div class="row">
    <table class="table table-hover table-responsive-sm table-striped table-fixed">
        <thead>
            <tr class="text-center">
                <th scope="col"><input type="checkbox" id="chkRow"></th>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categorias as $categoria)
        <tr class="text-center">
                        <th>
                            <input type="checkbox" id="chkRow-{{ $categoria->id }}">
                        </th>
                        <td class="text-left">{{ $categoria->id }}</td>
                        <td class="text-left">{{ $categoria->descricao }}</td>

                        <td style="text-align: center;">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ações
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="categorias/{{$categoria->id}}/edit">Editar</a>
                                    <form action="{{action('CategoriaController@destroy', $categoria->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="dropdown-item delete-categoria" type="submit">Apagar</button>
                                     </form>
                                </div>
                            </div>
                        </td>
                  </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.delete-categoria').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Tem certeza que deseja apagar esta categoria?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

});
</script>
@endsection