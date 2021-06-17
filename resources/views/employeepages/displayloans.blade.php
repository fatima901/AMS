@extends('layouts.master')
@section('title','All Loans')
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

@section('page-name', 'Manage Loan')

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
                        <th>Leave Type</th>
                        <th>Amount</th>
                        <th>Leave Status </th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @include('flash-message')

                    @forelse ($data as $index => $loan)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{\App\User::find($loan->user_id)->employee_name ?? 'Null'}}</td>

                            <td>{{$loan->leave_type ?? 'Null'}}</td>
                            <td> {{$loan->amount ?? 'Null'}}</td>
                            <td>
                                @if($loan->status == 1)
                                <button href="#" class="btn btn-sm btn-success">Approved</button>
                                @else
                                <button href="#" class="btn btn-sm btn-warning">Pending</button>
                                @endif
                            </td>
                            <td>{{$loan->description ?? ''}}</td>
                        </tr>
                    @empty
                    <tr>
                        <td> <p class="text-danger text-white p-1">No Loan</p></td>
                        <td> <p class="text-danger text-white p-1">No Loan</p></td>
                        <td> <p class="text-danger text-white p-1">No Loan</p></td>
                        <td> <p class="text-danger text-white p-1">No Loan</p></td>
                        <td> <p class="text-danger text-white p-1">No Loan</p></td>
                        <td> <p class="text-danger text-white p-1">No Loan</p></td>
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
