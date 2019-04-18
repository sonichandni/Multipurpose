@extends('layouts.app')

@section('content')
    <div class="card-header"><h1>Add Options</h1></div>
    <div class="card-body">
        <form name="option_add" id="option_add">
         {{ csrf_field() }}
        <label><b>Product Name:</b></label>
        <select class="form-control" name="prod" id="prod">
              <option value="">Select Product</option>
              @foreach ($products as $product) 
                <option value="{{ $product->id }}">{{ $product->name }}</option>
              @endforeach
        </select><br>

        <select class="form-control" name="clr" id="clr">
              <option value="">Select Color</option>
              @foreach ($colors as $color) 
                <option value="{{ $color->id }}">{{ $color->name }}</option>
              @endforeach
        </select><br>

        <select class="form-control" name="psize" id="psize">
              <option value="">Select Size</option>
              @foreach ($sizes as $size) 
                <option value="{{ $size->id }}">{{ $size->size }}</option>
              @endforeach
        </select><br>
        
        <center><button type="submit" class="btn btn-primary">Submit</button>    </center>
    </form>
    </div>
    <script>
      $(document).ready(function() 
      {
        $('form#option_add').submit(function(event) 
        {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            console.log(formData);
            $.ajax({
                url: "/options",
                method:"POST",
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
                        alert("Product Option Added Successfully");
                        
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