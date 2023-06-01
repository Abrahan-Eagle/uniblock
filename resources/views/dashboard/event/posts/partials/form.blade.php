<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-footer">

                <input class="form-control" name="user_id" id="user_id" type="hidden" value="{{ auth() -> user() -> id }}"> 

                
                <create-checkbox-component></create-checkbox-component> 
                

                <div class="form-group">
                    {!! Form::label('sponsor_id', 'Patrocinantes') !!}
                
                    <select class="form-control" id="sponsor_id" name="sponsor_id" required>
                        @foreach ($value as $sponsor)
                            <option value="{{ $sponsor -> id }}"> {{ $sponsor -> name }} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    {!! Form::label('category_id', 'Categorias') !!}
                
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category -> id }}"> {{ $category -> title }} </option>    
                        @endforeach
                    </select>
                </div>

                <create-post-component></create-post-component> 
                

                <div class="row">
                    <div class="col-sm-6">{!! Form::label('img', 'IMAGEN') !!} </div>
                    <div class="col-sm-6">{!! Form::label('statusx', 'ESTADO') !!}</div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="btn btn-secondary">
                            <svg class="c-icon">
                                <use
                                    xlink:href="{{asset('icons/sprites/free.svg#cil-folder-open')}}">
                                </use>
                            </svg>
                            <input type="file" style="display: none;" name="img">
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <label><input type="radio" name="statusx" name="statusx" value="PUBLISHED" > Publicado</label>
                        <label><input type="radio" name="statusx" name="statusx" value="DRAFT" > Borrador</label>
                    </div>
                </div> 

                

                {!! Form::label('tag', 'Etiquetas') !!}
                <div class="form-group">
                    @foreach ($tags as $tag)
                        <label><input type="checkbox" name="tags[]" value="{{ $tag -> id }}" > {{ $tag -> title }} </label>
                    @endforeach
                </div>

                {!! Form::label('excerpt', 'EXTRACTO') !!}
                <div class="input-group mb-3">
                    <textarea class="form-control w-100" name="excerpt" id="excerpt" cols="30" rows="2"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Extracto'"
                        placeholder='Extracto'>@empty($post)@else{{$post -> excerpt }}@endempty
                    </textarea>
                </div>


                <label>Contenido</label>
                <div class="input-group mb-3">
                    <textarea class="form-control" name="content" id="content">@empty($post)@else{{$post -> content }}@endempty</textarea>
                </div>

                <!-- <div class="form-group">
                    <label>Contenido</label>
                    <textarea class="form-control w-100" name="content" id="content" cols="30" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Descripción'"placeholder='Descripción'></textarea>
                </div>-->

                
            </div>
        </div>
    </div>
</div>



@section('script')

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<script type="text/javascript">

       
    CKEDITOR.config.width = 5000;     // 500 pixels wide.
    CKEDITOR.config.height = 'auto';   // CSS unit (percent).
    CKEDITOR.replace('content');
    CKEDITOR.inline('content');
   

</script>

</body>
 
@endsection