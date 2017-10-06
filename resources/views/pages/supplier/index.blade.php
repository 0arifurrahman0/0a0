@extends('layouts.master')
@section('title', 'Categories')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Manage Supplier</h3>

        <a href="{{ url('supplier/create') }}" class="btn btn-sm btn-info">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Supplier
        </a>
        
    </div>

    <hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Suppliers table --}}
			<suppliers></suppliers>
		</div>
	</div>

@endsection