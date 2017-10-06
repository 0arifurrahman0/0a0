@extends('layouts.master')
@section('title', 'Sale Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Add Sale
        </h3>

        <a href="{{ url('sale') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Sales
        </a>                      
    </div>

	<hr>

	<div class="well bs-component">
		{{-- Add sale form --}}
		<add-sale :customers="{{ $customers }}" :products="{{ $products }}"></add-sale>
	</div>

@endsection