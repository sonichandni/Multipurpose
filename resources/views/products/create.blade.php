@extends('layouts.app')

@section('content')
    @if($product->id!='0')
        <?php $title = $product->name;
        $desc = $product->description;
        $price = $product->price;
        $heading = "Edit";
        ?>
    @else
        <?php $title = "";
        $desc = "";
        $price = "";
        $heading = "Create";
        ?>
    @endif
    <div class="card-header"><h1>{{$heading}} Post</h1></div>
    <div class="card-body">
        
         {!! Form::open(['action'=>['ProductsController@update',$product->id],'id'=>'product_add','method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('name','Product Name')}}
                {{Form::text('name',$title,['class'=>'form-control','placeholder'=>'Product Name'])}}
            </div>

            <div class="form-group">
                {{Form::label('price','Product Price')}}
                {{Form::text('price',$price,['class'=>'form-control','placeholder'=>'Product Price'])}}
            </div>

            <div class="form-group">
                {{Form::label('desc','Product Description')}}
                {{Form::textarea('desc',$desc,['id'=>'keditor','class'=>'form-control','placeholder'=>'Product Description'])}}
            </div>
            
           @if($product!='')
                {{Form::hidden('_method','PUT')}}
            @endif 
            {{Form::submit('Submit',['id'=>'formsubmitajax','class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
    <script>
      $(document).ready(function() 
      {
        $('form#product_add').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var formAction = $(this).attr('action'); 
            var formMethod = $(this).attr('method'); 
            console.log(formData);
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
                        alert("Product Added Successfully");
                        $("#name").val()="";
                        
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