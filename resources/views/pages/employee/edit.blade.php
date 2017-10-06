@extends('layouts.master')
@section('title', 'Employee Edit')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>Edit Employee</h3>

        <a href="{{ url('employee') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Employees
        </a>
    </div>

    <hr>

	<div class="well bs-component">
		{{-- Edit employee form --}}
		<edit-employee :employee="{{ $employee }}"></edit-employee>
	</div>   

@endsection