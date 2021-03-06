@extends('layouts.master')
@section('title', 'Expense')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Expenses
        </h3>

        <a href="{{ url('expense/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Expense
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Expenses table --}}
			<expenses></expenses>
		</div>
	</div>
@endsection