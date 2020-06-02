<!DOCTYPE html>
<html>
<head>
    <title>TITLE</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('table') }}">Main Page</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('departments') }}">View All Departments</a></li>
        <li><a href="{{ URL::to('employees') }}">View All employees</a></li>
    </ul>
</nav>

<h1>Create a Employee</h1>

<!-- if there are creation errors, they will show here -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('storeEmp')}}" method="post">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Surname</label>
    <input type="text" class="form-control" placeholder="Enter Surname" name="surname" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Patronymic</label>
    <input type="text" class="form-control" placeholder="Enter Patronymic" name="patronymic">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sex</label>
    <select class="browser-default custom-select" name="sex">
        <option selected value="">Not selected</option>
        <option value="1">Male</option>
        <option value="0">Female</option>
    </select>
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Salary</label>
    <input type="text" class="form-control" placeholder="Enter Salary" name="salary" >
  </div>
  
  <div class="form-group">
  <label for="exampleInputEmail1">Departments</label>
    <div class="row">
      <div class="col-md-12">

      <select class="selectpicker" multiple data-live-search="true" name="departments[]">
        @foreach($departments as $department)
          <option value="{{$department->id}}">{{$department->name}}</option>
        
        @endforeach
      </select>
      

      </div>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();
});

</script>