@extends('layouts.master')
@section('title','Apply For Loan')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> --}}
@endsection

@section('page-name', 'Apply for Loan')

@section('main-content')
    @include('flash-message')

<!-- DataTales Example -->

<div class="card   shadow mb-4">
    {{-- /store/leave --}}
    <form action="/send/loan-request" method="POST" id="leave">
        @csrf
        <div class="card">
            <div class="mx-auto col-md-8">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col">
                            <label for="leave_type" class="col col-form-label"><strong>Loan Type</strong></label>
                            <select class="form-control" name="loan_type" id="">
                                 <option disabled selected>Select</option>
                                    <option value="Medical">Type 1</option>
                                    <option value="Medical">Type 2</option>
                                    <option value="Medical">Type 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="from" class="col col-form-label"><strong> Loan Amount </strong></label>
                            <div>
                                <input class="form-control" type="text" name="amount" id="status" placeholder="Enter amount">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong> Description </strong></label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            data-validation="required"></textarea>
                    </div>

                    <div class="form-group row text-center">
                        <div class="col">
                            <a class="btn  btn-secondary" href="/manage/loans">Cancel</a>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
{{--<script src="/vendor/leave.js"></script>--}}
<!-- Page level custom scripts -->
{{-- <script src="/js/demo/datatables-demo.js"></script> --}}

@endsection
