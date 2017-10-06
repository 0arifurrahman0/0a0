@extends('layouts.master')
@section('title', 'Sale')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Sales
        </h3>

        <a href="{{ url('sale/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Sale
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- Sale table --}}
			<sales></sales>
		</div>
	</div>

@endsection