@extends('layouts.master')
@section('title', 'Warehouse Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Warehouse</h3>

        <a href="{{ url('warehouse') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Warehouses
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit warehouse form --}}
		<edit-warehouse :warehouse="{{ $warehouse }}"></edit-warehouse>
	</div>   

@endsection