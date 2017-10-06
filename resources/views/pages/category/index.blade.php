@extends('layouts.master')
@section('title', 'Category')

@section('content')

	<!-- Content Header (Page header) -->

    <div class="content-header">
        <h3>
            Manage Categories
        </h3>

        <a href="{{ url('category/create') }}" class="btn btn-info btn-sm">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Category
        </a>          
    </div>

	<hr>

	<div class="row">
		<div class="col-sm-12">
			{{-- @foreach($categories as $category)
				<li>{{ $category->category_name }}</li>
				<ul>
					@foreach($category->subCategories as $child)
						<li>{{ $child->subcategory_name }}</li>
					@endforeach
				</ul>
			@endforeach --}}
			{{-- Categories table --}}
			<categories></categories>
		</div>
	</div>

@endsection