@extends('layouts.master')
@section('title','Attendance Reports')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection


@section('page-name', 'Attendance Reports')

@section('main-content')
    @include('flash-message')

{{-- <form id="Report-form" action="" method="GET"> --}}
<div class="row align-items-center input-datepicker">
  <div class="form-group col-md-6">
      <a href="{{ route('zkt.getAttendance') }}">
          <button class="btn btn-primary">Click To Fetch Latest Attendance Reports From Zkt Device</button>
      </a>
  </div>
    @if(\Illuminate\Support\Facades\Auth::user()->role == 'employee')
    <div class="form-group col-md-6">
        <a href="/employee-attendance-graph/{{\Illuminate\Support\Facades\Auth::id()}}" class="btn btn-sm btn-info" role="button">View Attendance On Graph</a>
  </div>
        @endif
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">

    <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
  </div>
  @csrf
  <div class="card-body">
    {{-- <input id="selectAll" type="text" value=""> --}}
    <div class="table-responsive" id="">
      <table class="text-center table-bordered table" width="100%" cellspacing="0" id="attendance_table">
        <thead>
          <tr>
            <th> Serial</th>
            <th>Employee Name</th>
            <th>Department Name</th>
            <th>Status</th>
              <th>Date</th>
          </tr>
        </thead>
          <tbody>
          @foreach($a as $aa)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{\App\User::find($aa->user_id)['employee_name']}}</td>
                <td>{{$aa['department_name']}}</td>
                @if($aa['type'] == 1)
                    <td>Check-in</td>
                @elseif($aa['type'] == 2)
                    <td>Check-out</td>
                @endif
                <td>{{$aa['attendance_date']}}</td>
            </tr>
          @endforeach
          </tbody>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>




@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/attendace.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="/js/demo/datatables-demo.js"></script> --}}


@endsection
