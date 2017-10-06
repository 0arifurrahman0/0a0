@extends('layouts.master')
@section('title', 'Purchase')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Purchase
        </h3>

        <a href="{{ url('purchase/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Purchase
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Purchase table --}}
			<purchases></purchases>
		</div>
	</div>

@endsection