@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Update Employee Details</h1></div>
	<div class="card-body">
		
		
		<form name="edit_emp" id="edit_emp">
         {{ csrf_field() }}
         <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
         <input type="hidden" name="eid" id="eid" value="{{$emp->id}}">
        <div class="form-group">
            <label><b>Employee Name:</b></label>
            <input type="text" name="emp_name" id="emp_name" class="form-control" value={{$emp->emp_name}}>
        </div>
        <label><b>Employee Country:</b></label>
        <select class="form-control" name="country" id="country">
              <option value="">Select Country</option>
              @foreach ($countries as $country) 
                <option value="{{ $country->country_id }}" 
                    @if($country->country_id == $emp->country_id)
                        <?php echo "selected"; ?>
                    @endif
                >{{ $country->country_name }}</option>
              @endforeach
        </select><br>
        <input type="hidden" name="emp_stid" id="emp_stid" value="{{$emp->state_id}}">
        <label><b>Employee State:</b></label>
        <select class="form-control" name="state" id="state">
           <option value="">Select Satate</option>
              @foreach ($states as $state) 
                <option value="{{ $state->state_id }}" 
                    @if($state->state_id == $emp->state_id)
                        <?php echo "selected"; ?>
                    @endif
                >{{ $state->state_name }}</option>
              @endforeach
        </select><br>

        <label><b>Employee City:</b></label>
        <select class="form-control" name="city" id="city">
                @foreach ($cities as $city) 
                <option value="{{ $city->city_id }}" 
                    @if($city->city_id == $emp->city_id)
                        <?php echo "selected"; ?>
                    @endif
                >{{ $city->city_name }}</option>
              @endforeach
        </select> <br>
        <center><button type="submit" class="btn btn-primary">Submit</button>    </center>
    </form>
	</div>
	<script type="text/javascript">
    $('#country').change(function(){

            //alert("hi");
            var cid = $(this).val();
           // var emp_stid = $("#emp_stid").val();
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
        $('form#edit_emp').on('submit', function(event) {
            event.preventDefault();
            //alert($(this).serialize());
            var eid = $("#eid").val();
            var emp_name = $("#emp_name").val();
            var country = $("#country").val();
            var state = $("#state").val();
            var city = $("#city").val();
            var token = $("#token").val();
            
            $.ajax({
                    url: "/emp/"+eid,
                    type: "POST",              
                    data: {
                        "emp_name":emp_name,
                        "country":country,
                        "state":state,
                        "city":city,
                        "_method": 'PUT',
                        "_token": token,
                    },
                    success: function(result)
                    {
                        //alert(result);
                        if(result == "suc")
                        {
                            alert("Update success");
                            
                        }
                    }
            });
        });
        });
    </script>

@endsection