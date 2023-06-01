<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-footer">
                        {!! Form::label('name', 'NAME') !!}
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="name" id="name"  @empty($category) placeholder= "Name"
                            @else value= " {{ $category -> name }} " @endempty >
                        </div>


                        {!! Form::label('slug', 'URL AMIGABLE') !!}
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="slug" id="slug"  @empty($category) placeholder= "Slug"
                            @else value= " {{ $category -> slug }} " @endempty >
                        </div>
                       

                        {!! Form::label('body', 'BODY') !!}
                        <div class="input-group mb-3">
                            <textarea class="form-control w-100" name="body" id="body" cols="30" rows="9"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Descripción'"
                                placeholder='Descripción'>@empty($category)@else{{$category -> body }}@endempty
                            </textarea>
                        </div>
            </div>
        </div>
    </div>
</div>



@section('script')

<script src="{{ asset('js/jquery.stringToSlug.js') }}" defer></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">

    var x = 1;
    console.log();

    $(document).ready(function() {
        $("#name").stringToSlug({
            callback: function(text) {
                console.log(text);
            }
        });
    });
</script>

@endsection
