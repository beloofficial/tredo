<!DOCTYPE html>
<html>
<head>
    <title>TITLE</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

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
        <li><a href="{{ route('indexDep') }}">View All Departments</a></li>
        <li><a href="{{ URL::to('employees') }}">View All Employees</a></li>
    </ul>
</nav>

<h1>Edit {{ $employee->name }}</h1>

<!-- if there are update errors, they will show here -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('updateEmp',['employee'=>$employee->id])}}" method="POST">
{{method_field('PUT')}}
     {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{old('name', $employee->name)}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Surname</label>
    <input type="text" class="form-control" placeholder="Enter Surname" name="surname" value="{{old('surname', $employee->surname)}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Patronymic</label>
    <input type="text" class="form-control" placeholder="Enter Patronymic" name="patronymic" value="{{old('patronymic', $employee->patronymic)}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sex</label>
    <select class="browser-default custom-select" name="sex">
        @if(is_null($employee->sex))
        <option selected value="">Not selected</option>
        <option value="1">Male</option>
        <option value="0">Female</option>
        @elseif($employee->sex)
        <option value="">Not selected</option>
        <option selected value="1">Male</option>
        <option value="0">Female</option>
        @else
        <option value="">Not selected</option>
        <option value="1">Male</option>
        <option selected value="0">Female</option>
        @endif
        i
        
    </select>
    </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Salary</label>
    <input type="text" class="form-control" placeholder="Enter Salary" name="salary" value="{{old('salary', $employee->salary)}}">
  </div>
  

  <div class="form-group">
  <label for="exampleInputEmail1">Deployments</label>
    <div class="row">
      <div class="col-md-12">

      <select class="selectpicker" multiple data-live-search="true" name="departments[]">
        @foreach($departments as $department)
          @if($employee->departments->contains($department->id))
            <option selected value="{{$department->id}}">{{$department->name}}</option>
          @else
            <option value="{{$department->id}}">{{$department->name}}</option>
          @endif
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