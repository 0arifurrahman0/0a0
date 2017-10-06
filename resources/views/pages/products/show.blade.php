@extends('layouts.master')
@section('title', 'Product Show')

@section('content')

	{{-- Content Header --}}
    <div class="content-header">
        <h3>View Product</h3>

        <a href="{{ url('product') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-list" aria-hidden="true"></i>
	        Manage Products
        </a>
        <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-success">
        	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        	Edit Product
        </a>
        <a href="{{ url('product/create') }}" class="btn btn-sm btn-success">
	        <i class="fa fa-plus-square" aria-hidden="true"></i>
	        Add Product
        </a>
    </div>

    <hr>
<div class="row">
	<div>
		<div class="col-sm-8">
			<h4>Poduct Image</h4>
			<img style="width:150px; height:auto;" class="thumbnail" src="{{asset('images/products/')}}/{{ $product->product_image }}">
		</div>
		<div>
			<h4>Bar Code</h4>
			<img style="width:150px; height:auto;" class="thumbnail" src="{{asset('images/products/barcode.png')}}">	
		</div>
	</div>
	<div>
		<div class="col-sm-6">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td> 
						Name : {{$product->product_name}}
					</td>
				</tr>
				<tr>
					<td>	
						Category Name : {{$product->category->category_name}}
					</td>	
				</tr>
				<tr>
					<td>
						Sub Category Name : {{$product->subCategory->subcategory_name}}
					</td>
				</tr>
				<tr>
					<td>		
						Supplier Name : {{$product->supplier->supplier_name}}
					</td>
				</tr>
				<tr>
					<td>	
						Stock Quantity : {{$product->product_unit}}
					</td>
				</tr>
				<tr>
					<td>
						Alert Quantity : {{$product->product_alertquantity}}
					</td>
				</tr>
				<tr>
					<td>
						Product Cost : {{$product->product_supplierPrice}}
					</td>
				</tr>
			</table>
		</div>
		<div class="col-sm-6">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td>
						Product Price : {{$product->product_sellPrice}}
					</td>
				</tr>
				<tr>
					<td> 
						Tax Rate : {{$product->product_tax}}
					</td>
				</tr>
				<tr>
					<td>	
						Ware House : {{$product->warehouse->warehouse_name}}
					</td>	
				</tr>
				<tr>
					<td>
						Product Details : {{$product->product_details}}
					</td>
				</tr>
				<tr>
					<td>		
						Details for Invoice : {{$product->product_detailsforinvoice}}
					</td>
				</tr>
			</table>
		</div>		
	</div>

</div>
@endsection