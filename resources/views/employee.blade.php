<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Page</title>
</head>
<body>

    <br>

    <!-- @if($grade>=75 && $grade<=100)
        Your grade {{$grade}}, is Passing! 
    @elseif($grade<=74 && $grade>=0)
        Your grade is Failing!
    @else
        Invalid Grade
    @endif -->

    <!-- @for($i=1;$i<=5;$i++)                   
        @for($j=1;$j<=$i;$j++)              
            {{$i}}
        @endfor                             
        <br>                                
    @endfor                                  -->

    @foreach($employees as $employee)
        <!-- @if($loop->index) -->
            {{$employee['name']}}
            {{$employee['age']}}
            {{$employee['department']}}
            <br>
        <!-- @endif -->
    @endforeach

    <!-- @forelse($employees as $employee)
        {{$employee['name']}}
        {{$employee['age']}}
        {{$employee['department']}}
        <br>
    @empty
        No Employee records yet!
    @endforelse -->

    <!-- @while($age<=17)
        {{$age}} is still a minor!
        @php
            $age++;
        @endphp
        <br>
    @endwhile -->
    
</body>
</html>