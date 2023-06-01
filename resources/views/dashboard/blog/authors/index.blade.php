@extends('layouts.app') @section('name', 'Blog | Autores') @section('content')



<div class="container">
    <div class="col-md-12 col-md-offset-2">
        <div id="ui-view">
            <div>
                <div class="fade-in">
                    <div class="card">
                        <div class="card-header"> Lista de Autores
                            <div class="card-header-actions"><a class="card-header-action"
                                    href=" {{ route('authors.create', ['level' => 'blog']) }} "><small class="text-muted">CREAR
                                        AUTORES</small></a></div>
                        </div>
                        <div class="card-body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info"
                                            style="border-collapse: collapse !important">
                                            <thead>
                                                <tr role="row">
                                                    <th width="5%">#</th>
                                                    <th width="55%">Nombre de la Autores</th>
                                                    <th width="40%">Acción</th>
                                                </tr>
                                            </thead>

                                            @foreach ($authors as $author)

                                                <tbody>

                                                    <tr role="row" style="vertical-align:middle;  text-align: center;">
                                                        <td>{{ $author->id }}</td>
                                                        <td>{{ $author->name }}</td>
                                                        <td>
                                                            <div class="row">   

                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-2">
                                                            <a class="btn btn-dark"
                                                                href="{{ route('authors.show', ['id' => $author->id]) }}"><svg
                                                                
                                                                    class="c-icon">
                                                                    <use
                                                                        xlink:href="{{ asset('icons/sprites/free.svg#cil-description') }}">
                                                                    </use>
                                                                </svg></a>
                                                            </div>
                                                             
                                                                <div class="col-sm-2">    
                                                            <a class="btn btn-info"
                                                                href="{{ route('authors.edit', ['id' => $author->id]) }}"><svg
                                                                    class="c-icon">
                                                                    <use
                                                                        xlink:href="{{ asset('icons/sprites/free.svg#cil-description') }}">
                                                                    </use>
                                                                </svg></a>
                                                            </div>
                                                                
                                                            
                                                            <div class="col-sm-2">
                                                                <form method="POST" action="{{ route('authors.destroy', ['id' => $author->id]) }}">
                                                                    @csrf
                                                                    <button class="btn btn-danger">
                                                                        <svg class="c-icon">
                                                                            <use xlink:href="{{ asset('icons/sprites/free.svg#cil-trash') }}"></use>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                                </div>
                                                                
                                                                <div class="col-sm-3"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                
                                


                                <div class="row">
                                    <div class="col-sm-12 col-md-12">

                                        @if ($authors->hasPages())
                                            <nav class="justify-content-center d-flex">
                                                <ul class="pagination">


                                                    @if ($authors->onFirstPage())
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{!!  $authors->previousPageUrl() !!}"
                                                                aria-label="Previous">
                                                                <span aria-hidden="false">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @endif


                                                    @if ($authors->onFirstPage())
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{!!  $authors->previousPageUrl() !!}">{!!
                                                                $authors->currentPage() - 1 !!}</a></li>
                                                    @endif

                                                    <li class="page-item active"><a class="page-link" href="#">{!!
                                                            $authors->currentPage() !!}</a></li>

                                                    @if ($authors->hasMorePages())
                                                        <li class="page-item"><a class="page-link"
                                                                href="{!!  $authors->nextPageUrl() !!}">{!!
                                                                $authors->currentPage() + 1 !!}</a></li>
                                                    @else
                                                    @endif

                                                    @if ($authors->hasMorePages())
                                                        <li class="page-item">
                                                            <a class="page-link" href="{!!  $authors->nextPageUrl() !!}"
                                                                aria-label="Next">
                                                                <span aria-hidden="false">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </nav>
                                        @endif
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
