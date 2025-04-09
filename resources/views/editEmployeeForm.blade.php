<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
    <form action="/employees/{{$employee->id}}" method="POST">
    @csrf
    @method('PUT')
        Employee Id:<input type="text" readonly name="employeeid" value="{{$employee->employeeid}}"><br>
        First Name:<input type="text" name="fname" value="{{$employee->fname}}"><br>
        Middle Name:<input type="text" name="middlename" value="{{$employee->middlename}}"><br>
        Last Name:<input type="text" name="lastname" value="{{$employee->lastname}}"><br>
        <input type="submit" value="Update">

    </form>

</body>
</html>