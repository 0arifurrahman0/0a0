@extends('layouts.master')
@section('title', 'Category Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Category</h3>

        <a href="{{ url('category') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Categories
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit category form --}}
		<edit-category :category="{{ $category }}"></edit-category>
	</div>   

@endsection