@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justif-ycontent-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>List of Users</h3>
        </div>

        <div class="card-body">

          @include('dashboard.role&permission.custom.message')


          <table class="table table-hover ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Role(2)</th>
                <th colspan="3">Accion</th>
              </tr>
            </thead>
            @foreach ($users as $user)

            <tbody>
              <tr>
                <td scope="row"> {{ $user -> id }} </td>
                <td>{{ $user -> name }}</td>
                <td>{{ $user -> email }}</td>
                <td>{{ $user -> description }}</td>
                @can('haveaccess', 'users.show')
                <td><a class="btn btn-primary" href="{{ route('users.show', $user -> id) }}"> Show </a></td>
                @endcan
                @can('haveaccess', 'users.edit')
                <td><a class="btn btn-success" href="{{ route('users.edit', $user -> id) }}"> Edit </a></td>
                @endcan
                @can('haveaccess', 'users.destroy')
                <td>
                  <form action="{{ route('users.destroy', $user -> id) }}" method="post">
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



          @if ($users ->hasPages())
          <nav class="justify-content-center d-flex">
            <ul class="pagination">


              @if ($users ->onFirstPage())
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              @else
              <li class="page-item">
                <a class="page-link" href="{!! $users ->previousPageUrl() !!}" aria-label="Previous">
                  <span aria-hidden="false">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              @endif


              @if ($users ->onFirstPage())
              @else
              <li class="page-item"><a class="page-link" href="{!! $users ->previousPageUrl() !!}">{!! $users
                  ->currentPage()-1 !!}</a></li>
              @endif

              <li class="page-item active"><a class="page-link" href="#">{!! $users ->currentPage() !!}</a></li>

              @if ($users -> hasMorePages())
              <li class="page-item"><a class="page-link" href="{!! $users ->nextPageUrl() !!}">{!! $users
                  ->currentPage()+1 !!}</a></li>
              @else
              @endif

              @if ($users -> hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{!! $users ->nextPageUrl() !!}" aria-label="Next">
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