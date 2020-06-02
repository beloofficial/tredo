<!DOCTYPE html>
<html>
<head>
    <title>TITLE</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
    <a class="navbar-brand" href="{{ route('table') }}">Main Page</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ route('indexDep') }}">View All Departments</a></li>
        <li><a href="{{ URL::to('employees') }}">View All employees</a></li>
    </ul>
</nav>

<h1>Edit {{ $department->name }}</h1>

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

<form action="{{route('updateDep',['department'=>$department->id])}}" method="POST">
    {{method_field('PUT')}}
     {{ csrf_field() }}

    <div class="form-group">
       <label>Name</label>
       <input type='text' name="name" value="{{old('name', $department->name)}}">
    </div>

   

    <button type="submit" class="btn btn-success">Update</button>

</form>


</div>
</body>
</html>