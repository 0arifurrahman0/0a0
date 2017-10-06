@extends('layouts.master')
@section('title', 'Sub Category Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Sub Category</h3>

        <a href="{{ url('subcategory') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Sub Categories
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit sub category form --}}
		<edit-subcategory :subcategory="{{ $subcategory }}" :categories="{{ $categories }}">
			
		</edit-subcategory>
	</div>   

@endsection