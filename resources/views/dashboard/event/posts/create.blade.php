@extends('layouts.app') @section('title', 'Create') @section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card border-primary">

                <div class="card-header"><strong>Crear Actividad</strong></div>


                <form action="{{ route('posts-event.store') }}" method="post" class="needs-validation"
                    accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="level" id="level" value="event" />

                        <create-checkbox-component></create-checkbox-component>
                        <create-post-component></create-post-component>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="street">Patrocinantes*</label>
                                <select class="form-control" id="sponsor_id" name="sponsor_id" required>
                                    @foreach ($value as $sponsor)
                                        <option style="color: #181924" value="{{ $sponsor->id }}"> {{ $sponsor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="street">Categorias*</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resumen*</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" name="excerpt" id="excerpt"
                                    required>@empty($post)@else{{ $post->excerpt }}@endempty</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date_start">Fecha de la Actividad*</label>
                                <input class="form-control" id="date_activi" type="datetime-local" name="date_activi"
                                    placeholder="date" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="date_stop">Fecha de la Duración*</label>
                                <input class="form-control" id="last_activity" type="datetime-local"
                                    name="last_activity" placeholder="date" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección*</label>
                            <input type="text" style="text-transform:capitalize;"
                                onkeyup="javascript:this.value=this.value.toLowerCase();" class="form-control"
                                id="direccion" name="direccion" placeholder="Dirección" required>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="firstName">Pais*</label>
                                <select class="form-control" id="country-dropdown" name="countries_id" required>
                                    <option style="color: #181924" value="0">Seleccionar pais</option>
                                    @foreach ($countries as $country)
                                        <option style="color: #181924 !important;" value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Estado*</label>
                                <select class="form-control" id="state-dropdown" name="state_id" required></select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Ciudad*</label>
                                <select class="form-control" id="city-dropdown" name="cities_id" required></select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="tags">Etiquetas*</label>
                        </div>
                        <div class="form-group">
                            @foreach ($tags as $tag)
                                <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    {{ $tag->title }}</label>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-sm-6">{!! Form::label('img', 'IMAGEN*') !!} </div>
                            <div class="col-sm-3">{!! Form::label('statusx', 'ESTADO*') !!}</div>
                            <div class="col-sm-3">{!! Form::label('activity', 'CONTADOR*') !!}</div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="btn btn-secondary float-left">
                                    <input type="file" style="display: none" name="img" required>
                                    Agregar Foto
                                </label>
                            </div>

                            <div class="col-sm-3">
                                <label><input type="radio" name="statusx" id="statusx"
                                        value="PUBLISHED">Publicado</label>
                                <label><input type="radio" name="statusx" id="statusx" value="DRAFT"> Borrador</label>
                            </div>
                            <div class="col-sm-3">
                                <label><input type="radio" name="activity" id="activity" value="ON">Activar</label>
                                <label><input type="radio" name="activity" id="activity" value="OFF">Desactivar</label>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-footer">
                                <button class="btn btn-block btn-facebook" type="submit"><span>Guardar</span></button>
                            </div>
                        </div>
                    </div>

                    <form />

            </div>
        </div>
    </div>
</div>

@endsection


@section('script')


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
            var countries_id = this.value;
            console.log(countries_id);
            var url = "{{ url('/get-states-by-country') }}";
            console.log(url);
            $("#state-dropdown").html('');
            $.ajax({
                url: "{{ url('/get-states-by-country') }}",
                type: "post",
                data: {
                    countries_id: countries_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-dropdown').html(
                        '<option value="">Seleccionar estado</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-dropdown").append(
                            '<option style="color: #181924 !important;" value="' +
                            value.id + '">' + value.name + '</option>');
                    });
                    $('#city-dropdown').html(
                        '<option value="0">Selecciona primero el estado</option>');
                }
            });
        });
        $('#state-dropdown').on('change', function() {
            var state_id = this.value;
            $("#city-dropdown").html('');
            $.ajax({
                url: "{{ url('get-cities-by-state') }}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#city-dropdown').html(
                    '<option value="">Seleccionar ciudad</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city-dropdown").append(
                            '<option style="color: #181924 !important;" value="' +
                            value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>

<script type="text/javascript">
    CKEDITOR.config.width = 5000; // 500 pixels wide.
    CKEDITOR.config.height = 'auto'; // CSS unit (percent).
    CKEDITOR.replace('content');
    CKEDITOR.inline('content');
    CKEDITOR.replace('excerpt');
    CKEDITOR.inline('excerpt');

</script>

@endsection
