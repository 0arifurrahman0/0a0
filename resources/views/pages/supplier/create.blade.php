@extends('layouts.master')
@section('title', 'Supplier Create')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Add Supplier</h3>

        <a href="{{ url('supplier') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Supplier
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Add supplier form --}}
		<add-supplier></add-supplier>
	</div>   

@endsection