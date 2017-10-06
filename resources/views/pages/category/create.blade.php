@extends('layouts.master')
@section('title', 'Category Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3 class="mb15">
            Add Category
        </h3>
        <a href="{{ url('category') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Categories
        </a>                
    </div>
 <hr>
	<div class="well bs-component">
		{{-- Add Category form --}}
		<add-category></add-category>
	</div>   

@endsection