@extends('layouts.master')
@section('title', 'Customer Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Income</h3>

        <a href="{{ url('income') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Incomes
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit income form --}}
		<edit-income :income="{{ $income }}"></edit-income>
	</div>   

@endsection