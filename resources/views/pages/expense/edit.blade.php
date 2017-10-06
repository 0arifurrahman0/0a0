@extends('layouts.master')
@section('title', 'Expense Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Expense</h3>

        <a href="{{ url('expense') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Expenses
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit expense form --}}
		<edit-expense :expense="{{ $expense }}"></edit-expense>
	</div>   

@endsection