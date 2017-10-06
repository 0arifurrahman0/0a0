@extends('layouts.master')
@section('title', 'Customer Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3 class="mb15">
            Add Customer
        </h3>
        <a href="{{ url('customer') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Customers
        </a>                
    </div>
 <hr>
	<div class="well bs-component">
		{{-- Add customer form --}}
		<add-customer></add-customer>
	</div>   

@endsection