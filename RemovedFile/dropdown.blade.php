<!DOCTYPE html>
<html>
<head>
    <title>Ajax dynamic dependent country state city dropdown using jquery ajax in Laravel 5.6</title>
    <link rel="stylesheet" href="http://www.codermen.com/css/bootstrap.min.css">    
    <script src="http://www.codermen.com/js/jquery.js"></script>
</head>
<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Ajax dynamic dependent country state city dropdown using jquery ajax in Laravel 5.6</div>
      <div class="panel-body">
            <form method="post" action="{{url('dependency')}}" enctype="multipart/formdata">
            <div class="form-group">
              @csrf
                <select id="country" name="country" class="form-control" style="width:350px" >
                <option value="" selected disabled>Select</option>
                  @foreach($countries as $key => $country)
                  <option value="{{$country}}"> {{$country}}</option>
                  @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="title">first name</label>
                <input type="text" name="first_name" id="image" class="form-control" style="width:350px">
            </div>
             <div class="form-group">
                <label for="title">Last name</label>
                <input type="text" name="last_name" id="image" class="form-control" style="width:350px">
            </div>
           <button type="submit" class="btn btn-default">Submit</button>
          </form>
      </div>
    </div>
</div>
</body>
</html>
<!-- <script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>
</body>
</html -->