@extends('layouts.master')
@section('title', 'Purchase Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Add Purchase
        </h3>

        <a href="{{ url('purchase') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Purchase
        </a>                      
    </div>

	<hr>

	<div class="well bs-component">
		{{-- Add purchase form --}}
		<add-purchase :suppliers="{{ $suppliers }}" :products="{{ $products }}"></add-purchase>
	</div>

@endsection