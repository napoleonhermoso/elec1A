<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <form action="/employees" method="POST">
    @csrf
        Employee Id:<input type="text" name="employeeid" value="{{old('employeeid')}}"><br>
        First Name:<input type="text" name="fname" value="{{old('fname')}}"><br>
        Middle Name:<input type="text" name="middlename" value="{{old('middlename')}}"><br>
        Last Name:<input type="text" name="lastname" value="{{old('lastname')}}"><br>
        <input type="submit" value="Save">

    </form>
   @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
   @endif
</body>
</html>