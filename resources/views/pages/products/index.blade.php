@extends('layouts.master')
@section('title', 'Products')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Products
        </h3>

        <a href="{{ url('product/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Product
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Products table --}}
			<products></products>
		</div>
	</div>
@endsection