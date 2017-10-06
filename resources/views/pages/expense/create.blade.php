@extends('layouts.master')
@section('title', 'Expense Create')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Add Expense</h3>

        <a href="{{ url('expense') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Expenses
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Add expense form --}}
		<add-expense></add-expense>
	</div> 
@endsection