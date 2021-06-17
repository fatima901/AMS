@extends('layouts.master')
@section('title','All Tasks')
@section("page-level-scripts-up")
    <!-- Custom styles for this page -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        table.dataTable tbody tr:hover {
            background-color: #c5cae9 !important;
        }
    </style>
@endsection

@section('page-name', 'Manage Tasks')

@section('main-content')


    <!-- DataTales Example -->


    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive" id="">
                <table class="hover text-center table-bordered table" width="100%" cellspacing="0" id="leave_list">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Employee Name</th>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status </th>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                            <th>Action </th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @include('flash-message')

                    @forelse ($d as $index => $task)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{\App\User::find($task->user_id)->employee_name ?? 'Null'}}</td>

                            <td>{{$task->name ?? 'Null'}}</td>
                            <td> {{$task->description ?? 'Null'}}</td>
                            <td>{{$task->created_at ?? ''}}</td>
                            <td>
                                @if($task->status == 1)
                                    <button href="#" class="btn btn-sm btn-success">Completed</button>
                                @else
                                    <a href="{{url('task/completed',$task->id)}}">
                                    <button  class="btn btn-sm btn-warning">Intiated</button>
                                    </a>
                                @endif
                            </td>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                            <td>
                                <a href="{{url('task/delete',$task->id)}}" class="btn btn-sm btn-danger deleteRecord"
                                   role="button">Delete</a>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td>No Task</td>
                            <td>No Task</td>
                            <td>No Task</td>
                            <td>No Task</td>
                            <td>No Task</td>
                            <td>No Task</td>
                            <td>No Task</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-level-scripts-down')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    <script src="/vendor/leave.js"></script>

@endsection
