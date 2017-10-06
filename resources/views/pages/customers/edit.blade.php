@extends('layouts.master')
@section('title', 'Customer Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Customer</h3>

        <a href="{{ url('customer') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Customers
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit customer form --}}
		<edit-customer :customer="{{ $customer }}"></edit-customer>
	</div>   

@endsection