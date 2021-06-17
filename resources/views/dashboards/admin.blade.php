@extends('layouts.master')
@if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
    @section('title','Admin Dashboard')
@else
    @section('title','Manager Dashboard')
@endif
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .grow {
    transition: all .2s ease-in-out;
  }

  .grow:hover {
    transform: scale(1.1);
  }
</style>
@endsection
@if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
    @section('page-name', 'Admin Dashboard')
@else
    @section('page-name', 'Manager Dashboard')
@endif
@section('stats')
@include('includes.stats')
@endsection

@section('main-content')

@include('flash-message')
@endsection
