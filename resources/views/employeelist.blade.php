<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Compact Pagination Styles */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 5px 0;
        }

        .pagination li {
            margin: 0 3px;
        }

        .pagination li a, .pagination li span {
            padding: 6px 10px;
            border: 1px solid #ddd;
            color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            transition: 0.2s;
        }

        .pagination li a:hover, .pagination .active span {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .disabled span {
            color: #bbb;
            background: #f1f1f1;
            cursor: not-allowed;
        }
    </style>
</head>
<body>  
    
    <a href="/employees/create">Add New Employee</a>
    @if(session("msg"))
        <strong>{{session("msg")}}</strong>
    @endif

    <table>
        <tr>
            <th>Employee Id</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Action</th>

        </tr>
    @foreach($employee as $emp)
        <tr>
            <td>{{$emp->employeeid}}</td>
            <td>{{$emp->fname}}</td>
            <td>{{$emp->middlename}}</td>
            <td>{{$emp->lastname}}</td>
            <td><a href="/employees/{{$emp->id}}">More Details</a></td>
            <td><a href="/employees/{{$emp->id}}/edit">Edit</a></td>
            <td>
                <form action="/employees/{{$emp->id}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </td>
             
        </tr>
    @endforeach
    </table>
    {{$employee->links()}}

</body>
</html>


