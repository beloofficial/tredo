<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
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

<h1>Table</h1>

<hr>

<table class="table table-bordered">
  <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        @foreach($departments as $department)
            <th scope="col">{{$department->name}}</th>
        @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($employees as $employee)
    <tr>
      <th scope="row">{{$employee->name}} {{$employee->surname}}</th>
      @foreach($departments as $department)
        @if($employee->departments->contains($department->id))
            <td style="text-align:center">True</td>
        @else 
            <td></td>
        @endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>


</div>
</body>
</html>