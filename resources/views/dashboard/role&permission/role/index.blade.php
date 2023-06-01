@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>List of Roles <a class="btn btn-primary float-right" href=" {{ route('roles.create') }} ">Create</a></h3>



        </div>

        <div class="card-body">

          @include('dashboard.role&permission.custom.message')


          <table class="table table-hover ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Full-Access</th>
                <th colspan="3">Accion</th>

              </tr>
            </thead>
            @foreach ($roles as $rol)
            <tbody>
              <tr>
                <td scope="row"> {{ $rol -> id }} </td>
                <td> {{ $rol -> name }} </td>
                <td> {{ $rol -> slug }} </td>
                <td> {{ $rol -> description }} </td>
                <td> {{ $rol['full-access'] }} </td>
                @can('haveaccess', 'roles.show')
                <td> <a class="btn btn-primary" href="{{ route('roles.show', $rol -> id) }}"> Show </a></td>
                @endcan
                @can('haveaccess', 'roles.edit')
                <td> <a class="btn btn-success" href="{{ route('roles.edit', $rol -> id) }}"> Edit </a></td>
                @endcan
                @can('haveaccess', 'roles.destroy')
                <td>
                  <form action="{{ route('roles.destroy', $rol -> id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </td>
                @endcan

              </tr>
            </tbody>
            @endforeach
          </table>


          @if ($roles ->hasPages())
          <nav class="justify-content-center d-flex">
            <ul class="pagination">


              @if ($roles ->onFirstPage())
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              @else
              <li class="page-item">
                <a class="page-link" href="{!! $roles ->previousPageUrl() !!}" aria-label="Previous">
                  <span aria-hidden="false">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              @endif


              @if ($roles ->onFirstPage())
              @else
              <li class="page-item"><a class="page-link" href="{!! $roles ->previousPageUrl() !!}">{!! $users
                  ->currentPage()-1 !!}</a></li>
              @endif

              <li class="page-item active"><a class="page-link" href="#">{!! $roles ->currentPage() !!}</a></li>

              @if ($roles -> hasMorePages())
              <li class="page-item"><a class="page-link" href="{!! $roles ->nextPageUrl() !!}">{!! $users
                  ->currentPage()+1 !!}</a></li>
              @else
              @endif

              @if ($roles -> hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{!! $roles ->nextPageUrl() !!}" aria-label="Next">
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
@endsection