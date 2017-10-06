@extends('layouts.master')
@section('title', 'Sub Category Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3 class="mb15">
            Add Sub Category
        </h3>
        <a href="{{ url('subcategory') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Sub Categories
        </a>                
    </div>
 <hr>
	<div class="well bs-component">
		{{-- Add Category form --}}
		<add-subcategory :categories="{{ $categories }}"></add-subcategory>
	</div>   

@endsection