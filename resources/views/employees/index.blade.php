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

<h1>Employees</h1>
<a class="btn btn-warning" href="{{ route('createEmp') }}">Create</a>
<hr>



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Surname</td>
            <td>Patronymic</td>
            <td>Sex</td>
            <td>Salary</td>
            <td>Departments</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $key => $value)
        <tr>
           
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->surname }}</td>
            <td>{{ $value->patronymic }}</td>
            
            @if(is_null($value->sex)) <td></td>
            @elseif($value->sex == 1) <td>Male</td>
            @elseif($value->sex == 0) <td>Female</td>
            @endif
            <td>{{ $value->salary }}</td>
            <td>
                @foreach($value->departments as $department)
                    {{$department->name}},
                @endforeach
            </td>
         
            <td style="display:flex">

                <a class="btn btn-small btn-info" href="{{route('editEmp',['employee'=>$value->id])}}">Edit</a>

                <form action="{{route('destroyEmp',['employee'=>$value->id])}}" method="post">
                @method('delete')
                @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>