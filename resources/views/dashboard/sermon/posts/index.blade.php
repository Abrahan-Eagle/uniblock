@extends('layouts.app') @section('title','Dashboard Task') @section('content')



    <div class="container">
        <div class="col-md-12 col-md-offset-2">
        <div id="ui-view">
            <div>
                

                <div class="fade-in">
                    <div class="card">
                        <div class="card-header"> Lista de post
                            <div class="card-header-actions"><a class="card-header-action" 
                                href=" {{ route('posts-sermon.create', ['level' => 'sermon']) }} " ><small class="text-muted">CREAR
                                     ETIQUETAS</small></a></div>



                        </div>
                        <div class="card-body">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                             
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead>
                                                <tr role="row">
                                                    <th width="5%">#</th>
                                                    <th width="55%">Nombre de los post</th>
                                                    <th width="40%">Acción</th>
                                                </tr>                                            </thead>

                                            @foreach ($posts as $post)

                                            <tbody>
                                               
                                                <tr role="row" style="vertical-align:middle;  text-align: center;">
                                                    <td class="sorting_1" >{{ $post -> id}}</td>
                                                    <td>{{ $post -> title}}</td>
                                                    
                                                    <td>
                                                        <div class="row">   

                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-2">
                                                        <a class="btn btn-dark"
                                                            href="{{ route('posts-sermon.show', ['level' => 'sermon', 'id' => $post->id]) }}"><svg
                                                                class="c-icon">
                                                                <use
                                                                    xlink:href="{{ asset('icons/sprites/free.svg#cil-description') }}">
                                                                </use>
                                                            </svg></a>
                                                        </div>
                                                         
                                                            <div class="col-sm-2">    
                                                        <a class="btn btn-info"
                                                            href="{{ route('posts-sermon.edit', ['level' => 'sermon', 'id' => $post->id]) }}"><svg
                                                                class="c-icon">
                                                                <use
                                                                    xlink:href="{{ asset('icons/sprites/free.svg#cil-description') }}">
                                                                </use>
                                                            </svg></a>
                                                        </div>
                                                            
                                                        
                                                        <div class="col-sm-2">
                                                            <form method="POST" action="{{ route('posts-sermon.destroy', ['level' => 'sermon', 'id' => $post->id]) }}">
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

                                        @if ($posts->hasPages())
                                            <nav class="justify-content-center d-flex">
                                                <ul class="pagination">


                                                    @if ($posts->onFirstPage())
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{!!  $posts->previousPageUrl() !!}"
                                                                aria-label="Previous">
                                                                <span aria-hidden="false">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                    @endif


                                                    @if ($posts->onFirstPage())
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{!!  $posts->previousPageUrl() !!}">{!!
                                                                $posts->currentPage() - 1 !!}</a></li>
                                                    @endif

                                                    <li class="page-item active"><a class="page-link" href="#">{!!
                                                            $posts->currentPage() !!}</a></li>

                                                    @if ($posts->hasMorePages())
                                                        <li class="page-item"><a class="page-link"
                                                                href="{!!  $posts->nextPageUrl() !!}">{!!
                                                                $posts->currentPage() + 1 !!}</a></li>
                                                    @else
                                                    @endif

                                                    @if ($posts->hasMorePages())
                                                        <li class="page-item">
                                                            <a class="page-link" href="{!!  $posts->nextPageUrl() !!}"
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

