@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>{{$product->name}}</h1><br><b>Price: </b>{{$product->price}}</div>
	<div class="card-body">
		<a href="/products" class="btn btn-primary">Back</a>
		<hr>
		<input type="hidden" name="pid" value="{{$product->id}}" id="pid">
		<b>Description: </b>{!!$product->description!!}<br>
		<i class="fa fa-star" id="s1" style="color: grey"></i>
		<i class="fa fa-star" id="s2" style="color: grey"></i>
		<i class="fa fa-star" id="s3" style="color: grey"></i>
		<i class="fa fa-star" id="s4" style="color: grey"></i>
		<i class="fa fa-star" id="s5" style="color: grey"></i>
		<br>
		
		Average Rating:

		@if((int)$avg_rating >= 1)
			@for($i = 0; $i < (int)$avg_rating; $i++)
				<i class="fa fa-star" style="color: red"></i>
			@endfor
		@else
			No Rating...<br><br>
		@endif	
		<div class="form-group">
			<div class="container">
		 		<div class="row">
		   			<div class="col-sm-10">
						<input type="text" name="comment" id="comment" class="form-control" placeholder="Comment here...">	
					</div>
					<div class="col-sm-2">
						<i class="fa fa-send fa-2x" id="comment_send"></i>
					</div>
				</div>
			</div>
		</div>
	
	@if(count($comments) > 0)
		@foreach($comments as $comment)
			{{$comment->comment}}<br>
			<small>{{$comment->created_at}}</small><br>
		@endforeach
	@endif
	<script>
		$(document).ready(function()
		{
			$('#s1').click(function(event){
				$(this).css('color', 'red');
				$('#s2').css('color', 'grey');
				$('#s3').css('color', 'grey');
				$('#s4').css('color', 'grey');
				$('#s5').css('color', 'grey');
				var product_id = $('#pid').val();
				var rating = "1";
				$.ajax({
					url: "/ratings",
					data: {product_id:product_id,rating:rating},
					method: "POST",
					headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
					success: function(result)
					{
							//alert("rating submitted");
							//document.getElementById('cha').innerHTML = result;
						
					}
				});
			});
			$('#s2').click(function(event){
				$('#s1').css('color', 'red');
				$(this).css('color', 'red');
				$('#s3').css('color', 'grey');
				$('#s4').css('color', 'grey');
				$('#s5').css('color', 'grey');
				var product_id = $('#pid').val();
				var rating = "2";
				$.ajax({
					url: "/ratings",
					data: {product_id:product_id,rating:rating},
					method: "POST",
					headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
					success: function(result)
					{
							//alert("rating submitted");
							//document.getElementById('cha').innerHTML = result;
						
					}
				});
			});
			$('#s3').click(function(event){
				$('#s1').css('color', 'red');
				$('#s2').css('color', 'red');
				$(this).css('color', 'red');
				$('#s4').css('color', 'grey');
				$('#s5').css('color', 'grey');
				var product_id = $('#pid').val();
				var rating = "3";
				$.ajax({
					url: "/ratings",
					data: {product_id:product_id,rating:rating},
					method: "POST",
					headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
					success: function(result)
					{
							//alert("rating submitted");
							//document.getElementById('cha').innerHTML = result;
						
					}
				});
			});
			$('#s4').click(function(event){
				$('#s1').css('color', 'red');
				$('#s2').css('color', 'red');
				$('#s3').css('color', 'red');
				$(this).css('color', 'red');
				$('#s5').css('color', 'grey');
				var product_id = $('#pid').val();
				var rating = "4";
				$.ajax({
					url: "/ratings",
					data: {product_id:product_id,rating:rating},
					method: "POST",
					headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
					success: function(result)
					{
							//alert("rating submitted");
							//document.getElementById('cha').innerHTML = result;
						
					}
				});
			});
			$('#s5').click(function(event){
				$('#s1').css('color', 'red');
				$('#s2').css('color', 'red');
				$('#s3').css('color', 'red');
				$('#s4').css('color', 'red');
				$(this).css('color', 'red');
				var product_id = $('#pid').val();
				var rating = "5";
				$.ajax({
					url: "/ratings",
					data: {product_id:product_id,rating:rating},
					method: "POST",
					headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
					success: function(result)
					{
							//alert("rating submitted");
							//document.getElementById('cha').innerHTML = result;
						
					}
				});
			});
			$('#comment_send').click(function(event){
				var product_id = $('#pid').val();
				var comment = $('#comment').val();
				$.ajax({
					url: "/comments",
					data: {product_id:product_id,comment:comment},
					method: "POST",
					headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
					success: function(result)
					{
							//alert("rating submitted");
							//document.getElementById('cha').innerHTML = result;
						
					}
				});
			});
		});
	</script>
@endsection
