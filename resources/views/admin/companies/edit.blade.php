@extends('layouts.master-dashboard')
@section('title',"Company Edit")
@section('content')
<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb" class="bread-crumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Company</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <h4>Edit Company Data</h4>
    @include('admin.companies.includes.form')
</div>
@endsection
@section('current-route')
route = "company";
@endsection
@section('script')
@include('admin.companies.includes.script')
@endsection('script')
