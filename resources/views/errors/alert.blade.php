@if (session('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if (count($errors))

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="alert alert-success">

                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endif
