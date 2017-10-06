@extends('layouts.master')
@section('title', 'Sale Edit')

@section('content')

		{{-- Content Header --}}
	    <div class="content-header">
	        <h3>Edit Sale</h3>

	        <a href="{{ url('sale') }}" class="btn btn-sm btn-success">
		        <i class="fa fa-list" aria-hidden="true"></i>
		        Manage Sales
	        </a>
	    </div>

	    <hr>

		<div class="well bs-component">
			{{-- Edit sale form --}}
			<edit-sale :sale="{{ $sale }}" :customers="{{ $customers }}" :products="{{ $products }}"></edit-sale>
		</div>   

@endsection