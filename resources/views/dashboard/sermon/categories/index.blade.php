@extends('layouts.app') @section('title', 'Blog | Categorias') @section('content')



<div class="container">
    <div class="col-md-12 col-md-offset-2">
        <div id="ui-view">
            <div>
                <div class="fade-in">
                    <div class="card">
                        <div class="card-header"> Lista de Categorias del sermon
                            <div class="card-header-actions"><a class="card-header-action"
                                    href=" {{ route('categories-sermon.create', ['level' => 'sermon']) }} "><small class="text-muted">CREAR
                                        CATEGORIAS</small></a></div>
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
                                                    <th width="55%">Nombre de la Categorias</th>
                                                    <th width="40%">Acción</th>
                                                </tr>
                                            </thead>

                                            @foreach ($categories as $category)

                                                <tbody>

                                                    <tr role="row" style="vertical-align:middle;  text-align: center;">
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->title }}</td>





                                                        <td>
                                                            <div class="row">   

                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-2">
                                                            <a class="btn btn-dark"
                                                                href="{{ route('categories-sermon.show', ['level' => 'sermon', 'id' => $category->id]) }}"><svg
                                                                
                                                                    class="c-icon">
                                                                    <use
                                                                        xlink:href="{{ asset('icons/sprites/free.svg#cil-description') }}">
                                                                    </use>
                                                                </svg></a>
                                                            </div>
                                                             
                                                                <div class="col-sm-2">    
                                                            <a class="btn btn-info"
                                                                href="{{ route('categories-sermon.edit', ['level' => 'sermon', 'id' => $category->id]) }}"><svg
                                                                    class="c-icon">
                                                                    <use
                                                                        xlink:href="{{ asset('icons/sprites/free.svg#cil-description') }}">
                                                                    </use>
                                                                </svg></a>
                                                            </div>
                                                                
                                                            
                                                            <div class="col-sm-2">
                                                                <form method="POST" action="{{ route('categories-sermon.destroy', ['level' => 'sermon', 'id' => $category->id]) }}">
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

                                        @if ($categories->hasPages())
                                            <nav class="justify-content-center d-flex">
                                                <ul class="pagination">


                                                    @if ($categories->onFirstPage())
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{!!  $categories->previousPageUrl() !!}"
                                                                aria-label="Previous">
                                                                <span aria-hidden="false">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @endif


                                                    @if ($categories->onFirstPage())
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{!!  $categories->previousPageUrl() !!}">{!!
                                                                $categories->currentPage() - 1 !!}</a></li>
                                                    @endif

                                                    <li class="page-item active"><a class="page-link" href="#">{!!
                                                            $categories->currentPage() !!}</a></li>

                                                    @if ($categories->hasMorePages())
                                                        <li class="page-item"><a class="page-link"
                                                                href="{!!  $categories->nextPageUrl() !!}">{!!
                                                                $categories->currentPage() + 1 !!}</a></li>
                                                    @else
                                                    @endif

                                                    @if ($categories->hasMorePages())
                                                        <li class="page-item">
                                                            <a class="page-link" href="{!!  $categories->nextPageUrl() !!}"
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
