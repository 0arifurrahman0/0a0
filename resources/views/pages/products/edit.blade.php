@extends('layouts.master')
@section('title', 'Product Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Product</h3>

        <a href="{{ url('product') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage products
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit product form --}}
		<edit-product :product="{{ $product }}" :warehouses="{{ $warehouses }}" :suppliers="{{ $suppliers }}" :categories="{{ $categories }}" :sub-categories="{{ $subCategories }}"></edit-product>
	</div>   

@endsection