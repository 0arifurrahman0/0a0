@extends('layouts.master')
@section('title', 'Warehouse Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3 class="mb15">
            Add Warehouse
        </h3>
        <a href="{{ url('warehouse') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Warehouses
        </a>                
    </div>
 <hr>
	<div class="well bs-component">
		{{-- Add warehouse form --}}
		<add-warehouse></add-warehouse>
	</div>   

@endsection