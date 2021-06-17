@extends('layouts.master')
@section('title','Create Task')
@section("page-level-scripts-up")
    <!-- Custom styles for this page -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> --}}
@endsection

@section('page-name', 'Create Task')

@section('main-content')
    @include('flash-message')

    <!-- DataTales Example -->

    <div class="card   shadow mb-4">
        {{-- /store/leave --}}
        <form action="{{route('tasks.store')}}" method="POST" id="leave">
            @csrf
            <div class="card">
                <div class="mx-auto col-md-8">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col">
                                <label for="leave_type" class="col col-form-label"><strong>Employee</strong></label>
                                <select class="form-control" name="user_id" id="" required>
                                    <option disabled selected>Select Employee</option>
                                    @foreach(\App\User::where('id', '!=', 1)->get() as $user)
                                        <option value="{{$user->id}}">{{$user->employee_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="from" class="col col-form-label"><strong> Task Name </strong></label>
                                <div>
                                    <input class="form-control" type="text" name="name" id="status" placeholder="Enter Task Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"><strong> Description </strong></label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                      data-validation="required" required></textarea>
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
