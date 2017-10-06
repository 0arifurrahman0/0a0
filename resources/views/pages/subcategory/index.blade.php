@extends('layouts.master')
@section('title', 'Sub Category')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Sub Categories
        </h3>

        <a href="{{ url('subcategory/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Sub Category
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">
			{{-- @foreach($subs as $sub)
				<li>{{ $sub->subcategory_name }}</li> 
				<span>{{ $sub->category->category_name }}</span> <br>
				<span>{{ $sub->category->category_details }}</span>
				<hr> --}}
				{{-- @php
					dd($sub);
				@endphp --}}
			{{-- @endforeach --}}
			{{-- SubCategories table --}}
			<subcategories></subcategories>

		</div>
	</div>

@endsection