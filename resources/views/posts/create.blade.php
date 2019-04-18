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
            {{Form::file('up_file')}}
           @if($post!='')
                {{Form::hidden('_method','PUT')}}
            @endif 
            {{Form::submit('Submit',['id'=>'formsubmitajax','class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
        {{-- <form method="POST" id="mfajax" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input id="postid" name="postid" type="hidden" value="0">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" placeholder="Title" name="title" type="text" value="" id="title">
            </div>
            <div class="form-group">
                <label for="desc">Body</label>
                <textarea id="keditor" class="form-control" placeholder="Body" name="desc" cols="50" rows="10"></textarea>
            </div>
             <div class="form-group">
                <label for="up_file">Image</label>
                <input type="file" name="up_file" class="form-control" id="up_file">
            </div>
            <center>
            <input id="formsubmitajax" class="btn btn-primary" type="submit" value="Submit"></center>
        </form>
 --}}
    </div>
    <div>
        <p id="chandni"></p>
    </div>
    <script>
      $(document).ready(function() 
      {
        $('form#mfajax').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var formAction = $(this).attr('action'); 
            var formMethod = $(this).attr('method'); 
            $.ajax({
                url: formAction,
                method:formMethod,
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                data: formData,
                processData: false,
                contentType: false,
                cache : false,
                success : function(res) 
                {
                    if(res)
                    {
                        alert("Post Inserted Successfully");
                        //document.getElementById("chandni").innerHTML = res;
                    }
                },
                error: function(data)
                {
                    console.log(data);
                }

            });
        });
     });   
    </script>

@endsection