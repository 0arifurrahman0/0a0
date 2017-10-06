@extends('layouts.master')
@section('title', 'Income Create')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Add Income</h3>

        <a href="{{ url('income') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Incomes
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Add income form --}}
		<add-income></add-income>
	</div> 
@endsection