@extends('layouts.master')
@section('title', 'Purchase Edit')

@section('content')

		{{-- Content Header --}}
	    <div class="content-header">
	        <h3>Edit Purchase</h3>

	        <a href="{{ url('purchase') }}" class="btn btn-sm btn-success">
		        <i class="fa fa-list" aria-hidden="true"></i>
		        Manage Purchase
	        </a>
	    </div>

	    <hr>

		<div class="well bs-component">
			{{-- Edit purchase form --}}
			<edit-purchase :purchase="{{ $purchase }}" :suppliers="{{ $suppliers }}" :products="{{ $products }}"></edit-purchase>
		</div>   

@endsection