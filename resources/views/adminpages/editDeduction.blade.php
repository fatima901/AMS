@extends('layouts.master')
@section('title','Create allowance')
@section('page-name', 'Create allowance')
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
<form action="/update/deduction/{{$id->id}}" method="post">
@csrf
<div class="row">
    <!--Employee Details Section -->
    <div class="col-lg-6 mx-auto ">
        @include('flash-message')
            <h5 class="card-title">Deduction</h5>
            <div class="card card-allowance">
                <div class="card-body">
                    <ul class="list-group allowance_container" id="allowance_list">
                        <li class="list-group-item">
                            <div class="row allowance_list_form">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control allowance_type" name="deduction_name"
                                            id="allowance_list" value="{{$id->deduction_name}}">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <div class=" mb-3  text-center ">
                    <button class="cancel_form btn btn-secondary"> Cancel </button>
                    <button type="submit" class="btn btn-primary"> Update </button>
                </div>
            </div>
    </div>


</div>
</form>
@endsection

@section('page-level-scripts-down')
<!-- Page level plugins -->
<script src="/vendor/allowance.js"></script>
@endsection




  {{-- allowance_deduction Details section --}}
  {{-- <div class="tab-pane fade" id="allowance_deduction" role="tabpanel" aria-labelledby="allowance_deduction-tab">
    <div class="container mt-5">
        <form action="/store/allowance&deductions" method="POST">
            <div class="row mt-4 ">
                @csrf
                <div class="col-lg-1">

                </div>
                <div class="col-lg-4 text-center">
                    <h5>Allowances</h5>

                    <ul class="list-group">
                        <li class="list-group-item border-0" id="allowance_list">
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    <input type="text" class="form-control reset" id = "allowance_name[]"  name="allowance_name[]" placeholder="Enter Allowance">
                                    <div class="col-auto">
                                        <a class="btn btn-secondary text-white" id="allowance"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @error('allowance_name.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </ul>

                </div>
                <div class="col-lg-2">

                </div>
                <div class="col-lg-4 text-center">
                    <h5>Deductions</h5>
                    <ul class="list-group">
                        <li class="list-group-item border-0" id="deduction_list">
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₦</span>
                                    </div>
                                    <input type="text" id = "deduction_name[]"  name = "deduction_name[]" class="form-control reset" placeholder="Enter Deduction">

                                    <div class="col-auto">
                                        <a class="btn btn-secondary text-white" id="deduction"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @error('deduction_name.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </ul>
                </div>
                <div class="col-lg-1">

                </div>


            </div>
            <div class=" col-lg-6 mx-auto  text-center ">
                <a href="#" class="cancel_form_allowance_deduction  text-white  btn btn-secondary"> Cancel </a>
                <button type="button" class="reset_form_lallowance_deduction btn btn-success"> Reset</button>
                <button type="submit" name="btn_save_allowance_deduction" id="btn_save_allowance_deduction"
                    class="btn btn-primary">
                    Submit </button>
            </div>
        </form>
    </div>
</div> --}}
