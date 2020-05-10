@extends('layouts.master-dashboard')
@section('title',"Employee")
@section('content')
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb" class="bread-crumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Employee</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div id="message-container" class="col-12">
        </div>
    </div>
    <h4>Add Company</h4>
    @include('admin.employee.includes.form')
</div>
@include('admin.employee.includes.list')
@include('admin.employee.includes.edit-modal')
@include('admin.employee.includes.delete-modal')
@endsection
@section('current-route')
route = 'employee';
@endsection
@section('script')
@include('admin.employee.includes.script')
@endsection('script')
