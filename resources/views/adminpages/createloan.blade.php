@extends('layouts.master')
@section('title','Create Loan Type')
@section('page-name', 'Create Loan Type')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .card {
        border: 0px;
        border-top: 1px solid #e3e6f0;
        border-radius: 0rem;
        /* background-color: #F8F9FC; */
    }


    .list-group-item {
        /* background-color: #F8F9FC; */
        border: 0px;
    }
</style>
@endsection
@section('main-content')
{{-- {!! Form::open(['action'=>'', 'method'=>'POST', 'class'=>'myform']) !!} --}}
<form action="/store/loan" method="post">
@csrf
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 mx-auto ">
        @include('flash-message')
            <h5 class="card-title">Loan Types</h5>
            <div class="card card-loan">
                <div class="card-body">
                    <ul class="list-group loan_container" id="loan_list">
                        <li class="list-group-item">
                            <div class="row loan_list_form">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control loan_type" name="loan_type"
                                            id="loan_list">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class=" mb-3  text-center ">
                    <button class="cancel_form btn btn-secondary"> Cancel </button>
                    <button type="button" class="reset_form btn btn-success"> Reset</button>
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </div>
    </div>


</div>
</form>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/loan.js"></script>
@endsection

