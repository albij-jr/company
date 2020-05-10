@extends('layouts.master-dashboard')
@section('title',"Company")
@section('content')
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb" class="bread-crumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Companies</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>{{ Session::get('success') }}
                </div>
            @endif
        </div>
    </div>
    <h4>Add Company</h4>
    @include('admin.companies.includes.form')
</div>
@include('admin.companies.includes.list')
@include('admin.companies.includes.modal')
@endsection
@section('current-route')
route = "company";
@endsection
@section('script')
@include('admin.companies.includes.script')
@endsection('script')
