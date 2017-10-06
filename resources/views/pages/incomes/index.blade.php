@extends('layouts.master')
@section('title', 'Purchase')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Incomes
        </h3>

        <a href="{{ url('income/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Income
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Incomes table --}}
			<incomes></incomes>
		</div>
	</div>
@endsection