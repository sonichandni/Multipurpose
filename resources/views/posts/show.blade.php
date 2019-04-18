@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>{{$post->title}}</h1></div>
	<center><img style="width:80%;" src="/storage/posts_images/{{$post->up_file}}"></center>
	<div class="card-body">
		{!!$post->description!!}
	</div>
@endsection