@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Insert Employee</h1></div>
	<div class="card-body">
	<form name="add_emp" id="add_emp">
		 {{ csrf_field() }}
		<div class="form-group">
		 	<label><b>Employee Name:</b></label>
		 	<input type="text" name="emp_name" id="emp_name" class="form-control">
		</div>
		<label><b>Employee Country:</b></label>
		<select class="form-control" name="country" id="country">
              <option value="">Select Country</option>
              @foreach ($countries as $country) 
                <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
              @endforeach
        </select><br>

        <label><b>Employee State:</b></label>
        <select class="form-control" name="state" id="state">
        </select><br>

        <label><b>Employee City:</b></label>
        <select class="form-control" name="city" id="city">
        </select> <br>
        <center><button type="submit" class="btn btn-primary">Submit</button>    </center>
	</form>
	</div>
	<script type="text/javascript">
    $('#country').change(function(){

            //alert("hi");
            var cid = $(this).val();
            //alert(cid);
            if(cid){
            $.ajax({
               type:"get",
               url:"{{url('/state')}}/"+cid,
               success:function(res)
               {       
                    if(res)
                    {
                        $("#state").empty();
                        $("#city").empty();
                        $("#state").append('<option>Select State</option>');
                        $.each(res,function(key,value){
                            $("#state").append('<option value="'+key+'">'+value+'</option>');
                        });
                    //console.log(res);        
                    }
                   // $("#state").empty();
               }

            });
            }
        });
        $('#state').change(function(){

            //alert("hi");
            var sid = $(this).val();
            //alert(sid);
            if(sid){
            $.ajax({
               type:"get",
               url:"{{url('/city')}}/"+sid,
               success:function(res)
               {       
                    if(res)
                    {
                        $("#city").empty();
                        $("#city").append('<option>Select City</option>');
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+key+'">'+value+'</option>');
                        });
                    //console.log(res);        
                    }
               }

            });
            }
        });
        $(document).ready(function(){
        $('form#add_emp').on('submit', function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{url('/emp')}}",
                type: "POST",              
                data: $(this).serialize(),
                success: function(result)
                {
                    if(result == "suc")
                    {
                        alert("insert success");
                        $("#emp_name").val("");
                        $("#state").empty();
                        $("#city").empty();
                    }
                }
            });
           
		});
    });
    </script>

@endsection