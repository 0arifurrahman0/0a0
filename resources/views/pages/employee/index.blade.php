@extends('layouts.master')
@section('title', 'Employee')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Employees
        </h3>

        <a href="{{ url('employee/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Employee
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">

			{{-- employees table --}}
			<employees></employees>
		</div>
	</div>

@endsection