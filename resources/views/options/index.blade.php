@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Options</h1></div>
	<div class="card-body">
		<a href="/options/create" class="btn btn-primary">Add Options</a>
		<hr>Filters:
		<br>
		<div class="btn-group">
		  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Price Range
		  </button>
		  <div class="dropdown-menu">
		    <a class="dropdown-item" id="r1">0-200</a>
		    <a class="dropdown-item" id="r2">200-500</a>
		    <a class="dropdown-item" id="r3">500-1000</a>
		    <a class="dropdown-item" id="r4">1000+</a>
		    <div class="dropdown-divider"></div>
		  </div>
		  
		</div>
		<button type="button" class="btn btn-secondary" id="product_lth">Low to High</button>
		<button type="button" class="btn btn-secondary" id="product_htl">High to Low</button>
		<hr>
		<table class="table">
			<thead class="table-danger">
				<th>Product name</th>
				<th>Price</th>
			</thead>
			<tbody id="pfil">
				
		        	@foreach($products as $product)
		        	<tr><td><b>
		        		<a class="list-group-item list-group-item-action" href="/get-prod-color/{{$product->id}}"> {{$product->name}} </a></b></td>
		        		<td>{{$product->price}}</td>
		        	@endforeach
				
			</tbody>
		</table>
        
	</div>
	<script>
		$(document).ready(function(){
			$('#product_lth').click(function(){
				$.ajax({
	               type:"get",
	               url:"{{url('/getProdLth')}}",
	               success:function(res)
	               {       
	                  if(res)
	                  {
	                     
	                      var content = '';
	                      var data = $.parseJSON(res);
	                      $.each(data, function(i, product) {
	                          content += '<tr><td><a class="list-group-item list-group-item-action" href="/get-prod-color/' + product.id + '"><b>' + product.name + '</b></td><td>' + product.price + '</tr>';
	                      });
	                      document.getElementById("pfil").innerHTML = content;
	                  }
	               }

	            });
			});
			$('#product_htl').click(function(){
				$.ajax({
	               type:"get",
	               url:"{{url('/getProdHtl')}}",
	               success:function(res)
	               {       
	                  if(res)
	                  {
	                     
	                      var content = '';
	                      var data = $.parseJSON(res);
	                      $.each(data, function(i, product) {
	                          content += '<tr><td><a class="list-group-item list-group-item-action" href="/get-prod-color/' + product.id + '"><b>' + product.name + '</b></td><td>' + product.price + '</tr>';
	                      });
	                      document.getElementById("pfil").innerHTML = content;
	                  }
	               }

	            });
			});
			$('#r1').click(function(){
				$.ajax({
	               type:"get",
	               url:"{{url('/getProdR1')}}",
	               success:function(res)
	               {       
	                  if(res)
	                  {
	                     
	                      var content = '';
	                      var data = $.parseJSON(res);
	                      $.each(data, function(i, product) {
	                          content += '<tr><td><a class="list-group-item list-group-item-action" href="/get-prod-color/' + product.id + '"><b>' + product.name + '</b></td><td>' + product.price + '</tr>';
	                      });
	                      document.getElementById("pfil").innerHTML = content;
	                  }
	               }

	            });
			});
			$('#r2').click(function(){
				$.ajax({
	               type:"get",
	               url:"{{url('/getProdR2')}}",
	               success:function(res)
	               {       
	                  if(res)
	                  {
	                     
	                      var content = '';
	                      var data = $.parseJSON(res);
	                      $.each(data, function(i, product) {
	                          content += '<tr><td><a class="list-group-item list-group-item-action" href="/get-prod-color/' + product.id + '"><b>' + product.name + '</b></td><td>' + product.price + '</tr>';
	                      });
	                      document.getElementById("pfil").innerHTML = content;
	                  }
	               }

	            });
			});
			$('#r3').click(function(){
				$.ajax({
	               type:"get",
	               url:"{{url('/getProdR3')}}",
	               success:function(res)
	               {       
	                  if(res)
	                  {
	                     
	                      var content = '';
	                      var data = $.parseJSON(res);
	                      $.each(data, function(i, product) {
	                          content += '<tr><td><a class="list-group-item list-group-item-action" href="/get-prod-color/' + product.id + '"><b>' + product.name + '</b></td><td>' + product.price + '</tr>';
	                      });
	                      document.getElementById("pfil").innerHTML = content;
	                  }
	               }

	            });
			});
			$('#r4').click(function(){
				$.ajax({
	               type:"get",
	               url:"{{url('/getProdR4')}}",
	               success:function(res)
	               {       
	                  if(res)
	                  {
	                     
	                      var content = '';
	                      var data = $.parseJSON(res);
	                      $.each(data, function(i, product) {
	                          content += '<tr><td><a class="list-group-item list-group-item-action" href="/get-prod-color/' + product.id + '"><b>' + product.name + '</b></td><td>' + product.price + '</tr>';
	                      });
	                      document.getElementById("pfil").innerHTML = content;
	                  }
	               }

	            });
			});

		});
	</script>
@endsection