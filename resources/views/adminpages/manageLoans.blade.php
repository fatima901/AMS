@extends('layouts.master')
@section('title','Manage Loans Type')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('page-name', 'Manage Loan Type')

@section('main-content')
    @include('flash-message')

    <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Loan Types </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th class="text-capitalize">Loan Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($loans as $index => $loan)

                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$loan->loan_type}}</td>
                        <td>
                            <a href="/edit/loan/{{$loan->id}}" class="btn btn-sm btn-primary" role="button">Edit</a>
                            <a href="/delete/loan/{{$loan->id}}" class="btn btn-sm btn-danger" role="button">Delete</a>
                        </td>
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
