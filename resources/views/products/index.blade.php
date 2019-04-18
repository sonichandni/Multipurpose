@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Products</h1></div>
	<div class="card-body">
		<a href="/products/create" class="btn btn-primary">Add Product</a>
		<hr>
		@if(count($products)>0)
			<table class="table">
	            <tr class="table-danger">
	                <th>Name</th>
	                <th>Price</th>
	                <th></th>
	                <th></th>
	            </tr>
				@foreach($products as $product)
					<tr>
						<td>
							<a href="/products/{{$product->id}}">{{$product->name}}</a>
						</td>
						<td>
							{{$product->price}}
						</td>
						<td>
							<a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a>
						</td>
						<td>
							{!!Form::open(['action'=>['ProductsController@destroy',$product->id],'method'=>'POST','class'=>'pull-right'])!!}
	                            {{Form::hidden('_method','DELETE')}}
	                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
	                        {!!Form::close()!!}</td>
	                </tr>
				@endforeach
				
		</table>
			{{$products->links()}}
		@else
			<p>No Products Found</p>
		@endif
	</div>
@endsection