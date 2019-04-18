@extends('layouts.app')

@section('content')
    @if($post->id!='0')
        <?php $title = $post->title;
        $desc = $post->description;
        $heading = "Edit";
        ?>
    @else
        <?php $title = "";
        $desc = "";
        $heading = "Create";
        ?>
    @endif
    <div class="card-header"><h1>{{$heading}} Post</h1></div>
    <div class="card-body">
        
        {!! Form::open(['action'=>['CrudsController@update',$post->id],'id'=>'mfajax','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {{Form::hidden('postid',$post->id,['id'=>'postid'])}}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$title,['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('desc','Body')}}
                {{Form::textarea('desc',$desc,['id'=>'keditor','class'=>'form-control','placeholder'=>'Body'])}}
            </div>
            {{Form::file('up_file',['id'=>'postid'])}}
            @if($post!='')
                {{Form::hidden('_method','PUT')}}
            @endif
            {{Form::submit('Submit',['id'=>'formsubmitajax','class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
@endsection