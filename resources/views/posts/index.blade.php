@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Posts</h1></div>
	<div class="card-body">
		<a href="/posts/create" class="btn btn-primary">Create Post</a>
		<hr>
		@if(count($posts)>0)
			<table class="table">
	            <tr class="table-danger">
	            	<th></th>
	                <th>Title</th>
	                <th></th>
	                <th></th>
	            </tr>
				@foreach($posts as $post)
					<tr>
						<td><img style="width:100px;" src="/storage/posts_images/{{$post->up_file}}"></td>
						<td>
							<h1><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1><br><small>Written on {{$post->created_at}}</small>
						</td>
						<td>
							<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
						</td>
						<td>
							{!!Form::open(['action'=>['CrudsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
	                            {{Form::hidden('_method','DELETE')}}
	                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
	                        {!!Form::close()!!}</td>
	                </tr>
				@endforeach
				
		</table>
			{{$posts->links()}}
		@else
			<p>No Posts Found</p>
		@endif
	</div>
@endsection