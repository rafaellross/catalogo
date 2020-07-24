@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Atualizar Produto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{action('ProdutoController@update', $produto->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ $produto->titulo }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="preco" class="col-md-4 col-form-label text-md-right">{{ __('Preço') }}</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control{{ $errors->has('preco') ? ' is-invalid' : '' }}" name="preco" value="{{$produto->preco}}" required>

                                @if ($errors->has('preco'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('preco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control form-control-lg" name="descricao" rows="5" style="resize: none;">{{$produto->descricao}}</textarea>

                                @if ($errors->has('descricao'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job_id" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select name="categoria_id" class="form-control">
                                    <option value="" {{$produto->categoria_id == "" ? 'selected' : ''}}>-</option>
                                  @foreach (App\Categoria::all() as $categoria)
                                      <option value="{{$categoria->id}}" {{$categoria->id == $produto->categoria_id ? 'selected' : ''}}>{{$categoria->descricao}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group alert alert-info" role="alert">
                            <h4 style="text-align: center;">Fotos</h4>
                            <div id="additional_photos"></div>
                            <div>
                                <input id="addPhoto" type="button" class="btn btn-success btn-sm ml-2 addPhoto" value="Adicionar Foto">
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    let qa_photos = $(".photo-row").length + 1;
    $("#addPhoto").click(function() {

        var photo = `
            <div class="alert alert-secondary photo-row" id="photos[` + qa_photos + `]_row">
                <h5 style="text-align: center;">Photo ` + qa_photos + `</h5>
                <div class="input-group col-12 mb-3">
                <div class="custom-file">
                    <input type="file" accept="image/png, image/jpeg" class="custom-file-input qa_photos" id="photos[` + qa_photos + `]" name="photos[` + qa_photos + `]"/>
                    <label class="custom-file-label" for="photos[` + qa_photos + `]">Choose files</label>
                </div>
                </div>
                <div class="input-group col-12 mb-3">
                    <img id="photos[` + qa_photos + `]_img" src="" class="img-fluid" style="">
                </div>
                <input id="photos[` + qa_photos + `]-delete" type="button" class="btn btn-danger btn-sm ml-2 delPhoto" value="Delete">
                <input type="hidden" class="custom-file-input" id="photos[` + qa_photos + `]_hidden" name="photos[` + qa_photos + `]_hidden" value="">
            </div>
            `;
            qa_photos++;
            $("#additional_photos").append(photo);
    });

    $(document).on("click", ".delPhoto", function(){
        var destination = $(this).prop('id').split("-");
        qa_photos--;
        $("[id*='"+ destination[0] +"_row']").remove();
  });

  function loadCert(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var destination = $(input).prop('name');
        var preview = $("[id*='" + destination + "_img']");
        preview.attr('src', e.target.result).show();
        var hidden = $("#" + destination + "_hidden");
        hidden.val(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function resizeImage(input, width = 600) {
    var destination = $(input).prop('name');
    var preview = $("[id*='" + destination + "_img']");
    var hidden = $("[id*='" + destination + "_hidden']");

    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(event) {
        var img = new Image();
        img.onload = function() {
          var oc = document.createElement('canvas'),
            octx = oc.getContext('2d');
          oc.width = img.width;
          oc.height = img.height;
          octx.drawImage(img, 0, 0);
          while (oc.width * 0.5 > width) {
            oc.width *= 0.5;
            oc.height *= 0.5;
            octx.drawImage(oc, 0, 0, oc.width, oc.height);
          }
          oc.width = width;
          oc.height = oc.width * img.height / img.width;
          octx.drawImage(img, 0, 0, oc.width, oc.height);
          preview.attr('src', oc.toDataURL()).show();
          hidden.val(oc.toDataURL());
        };
        img.src = event.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  //Load certificates
  $(document).on("change", "input[type=file]", function() {
    resizeImage(this);
  });




});

</script>
@endsection