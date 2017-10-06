@extends('layouts.master')
@section('title', 'Customer')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Customers
        </h3>

        <a href="{{ url('customer/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Customer
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Customers table --}}
			<customers></customers>
		</div>
	</div>

@endsection