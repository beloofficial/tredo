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

<h1>Departments</h1>
<a class="btn btn-warning" href="{{ route('createDep') }}">Create</a>
<hr>

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
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Count</td>
            <td>Max Salary</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($departments as $key => $value)
        <tr>
           
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{$value->employees->count()}}</td>
            <td>{{$value->employees->max('salary')}}</td>
        
            <td style="display:flex">

                <a class="btn btn-small btn-info" href="{{route('editDep',['department'=>$value->id])}}">Edit</a>

                <form action="{{route('destroyDep',['department'=>$value->id])}}" method="post">
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