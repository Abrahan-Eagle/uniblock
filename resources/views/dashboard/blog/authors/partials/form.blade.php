<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-footer">

                <create-author-component></create-author-component> 

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


               
            </div>
        </div>
    </div>
</div>

