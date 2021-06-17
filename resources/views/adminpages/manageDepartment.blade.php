@extends('layouts.master')
@section('title','Manage Department')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('page-name', 'Manage Departments')
@section('main-content')
    @include('flash-message')

    <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Departments and Designations</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial</th>
            <th>Departments</th>
            <th>Total Employees</th>
              @if(Auth::user()->role == 'admin')
            <th>Action</th>
              @endif
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Serial</th>
            <th>Departments</th>
            <th>Total Employees</th>
              @if(Auth::user()->role == 'admin')
              <th>Action</th>
              @endif
          </tr>
        </tfoot>
        <tbody>

            @foreach ($departments as $department)

                    <tr>
                        <td>{{$department->id}}</td>
                        <td>{{$department->department_name}}</td>

                        <td>
                           {{$department->users_count}}
                        </td>
                        @if(Auth::user()->role == 'admin')
                        <td>
                        <a href="/department/{{$department->id}}/editDepartmentDesigantion" class="btn btn-sm btn-primary" role="button">Edit</a>
                        <a href="/department/delete/{{$department->id}}" class="btn btn-sm btn-danger" role="button">Delete</a>
                        </td>
                            @endif
                    </tr>

            @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection
