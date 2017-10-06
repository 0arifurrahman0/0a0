@extends('layouts.master')
@section('title', 'Warehouse')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Warehouses
        </h3>

        <a href="{{ url('warehouse/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Warehouse
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Warehouses table --}}
			<warehouses></warehouses>
		</div>
	</div>

@endsection