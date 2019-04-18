@extends('layouts.app')

@section('content')
    <div class="card-header"><h1>Country - States - Cities</h1></div>
    <div class="card-body">
       
            <select class="form-control" name="country" id="country">
              <option value="">Select Country</option>
              @foreach ($countries as $country) 
                <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
              @endforeach
            </select><br>

            <select class="form-control" name="state" id="state">
            </select><br>

            <select class="form-control" name="city" id="city">
            </select> <br>
            <table class="table">
              <thead class="table-danger">
                <th>Name</th>
                
              </thead>
              <tbody id="csc">
                
              </tbody>
              
            </table>
           
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
        $('#city').change(function(){
            var ctid = $(this).val();
            //alert(cid);
             if(ctid){
             $.ajax({
               type:"get",
               url:"{{url('/get_emp')}}/"+ctid,
               success:function(res)
               {       
                  if(res)
                  {
                     
                      var content = '';
                      var data = $.parseJSON(res);
                      $.each(data, function(i, post) {
                          content += '<tr><td><b>' + post.emp_name + '</b></td></tr>';
                      });
                      document.getElementById("csc").innerHTML = content;
                  }
               }

            });
            }
        });
        
        
    </script>

@endsection