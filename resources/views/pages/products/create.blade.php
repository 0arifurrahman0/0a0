@extends('layouts.master')
@section('title', 'Product Create')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Add product</h3>

        <a href="{{ url('product') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage products
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Add product form --}}
		<add-product :warehouses="{{ $warehouses }}" :suppliers="{{ $suppliers }}" :categories="{{ $categories }}" ></add-product>
	</div> 
@endsection