@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Options</h1></div>
	<div class="card-body">
		<a href="/options" class="btn btn-primary">Back</a>
		<hr>
		
		@foreach($products as $product)
        	<h2>{{$product->product->name}}</h2>
        	@break;
        @endforeach
		Available colors and sizes:
		@if(count($products) > 0)
			<ul>
	        	@foreach($products as $product)
	        		<li>Color : {{$product->color->name}} & Size : {{$product->size->size}}</li>
	        	@endforeach
        	</ul>
		@endif
	</div>
@endsection