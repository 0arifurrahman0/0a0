@extends('layouts.master')
@section('title', 'Employee Create')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3 class="mb15">
            Add Employee
        </h3>
        <a href="{{ url('employee') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Employees
        </a>                
    </div>
 <hr>
	<div class="well bs-component">
		{{-- Add employee form --}}
		<add-employee></add-employee>
	</div>   

@endsection