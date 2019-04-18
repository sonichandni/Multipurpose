@extends('layouts.app')

@section('content')
	<div class="card-header"><h1>Employee</h1></div>
	<div class="card-body">
		<a href="/emp/create" class="btn btn-primary">Insert Employee</a>
		<hr>
		@if(count($employees)>0)
			<table class="table">
	            <tr class="table-danger">
	            	<th>Name</th>
	                <th>Counrty</th>
	                <th>State</th>
	                <th>City</th>
	                <th></th>
	                <th></th>
	            </tr>
				@foreach($employees as $employee)
					<tr id="{{$employee->id}}">
						<td> {{$employee->emp_name}} </td>
						<td>
							@foreach($countries as $country)
								@if($country->country_id == $employee->country_id)
									{{$country->country_name}}
								@endif
							@endforeach
		       			</td>
						<td>
							@foreach($states as $state)
								@if($state->state_id == $employee->state_id)
									{{$state->state_name}}
								@endif
							@endforeach
        				</td>
						<td>
							@foreach($cities as $city)
								@if($city->city_id == $employee->city_id)
									{{$city->city_name}}
								@endif
							@endforeach
						</td>
						<td>
							<a href="/emp/{{$employee->id}}/edit" class="btn btn-default">Edit</a>
						</td>
						<td>
							<form>
								{{ csrf_field() }}
								
								<button type="button" name="Delete"  data-id="{{ $employee->id }}" class="btn btn-danger deleteemp" data-token="{{ csrf_token() }}">Delete</button>
							</form> 
						</td>
	                </tr>
				@endforeach
				
		</table>
			{{$employees->links()}}
		@else
			<p>No Employees Found</p>
		@endif

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
        $('.deleteemp').on('click', function(event) {
        	event.preventDefault();
        	var id = $(this).data("id");
        	
        	var token = $(this).data("token");
			$.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                    url: "emp/"+id,
                    type: "POST",
                    data: {
                    	"id": id,
		                "_method": 'DELETE',
		                "_token": token,
					},      
               		success: function(result)
                    {
                    	//alert(result);
                        if(result == "suc")
                        {
                        	alert("delete success");
                        	$('tr#'+id).hide();
                        }
                    }
                });
			});
        });
    </script>

@endsection