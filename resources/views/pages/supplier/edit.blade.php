@extends('layouts.master')
@section('title', 'Supplier Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Supplier</h3>

        <a href="{{ url('supplier') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Supplier
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit supplier form --}}
		<edit-supplier :supplier="{{ $supplier }}"></edit-supplier>
	</div>   

@endsection