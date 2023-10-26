<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Your ToDOs</title>
</head>
<body>
    <main>
        <div>
            @extends('layout')
        </div>
        @foreach ($tasks as $task)
            <div style="margin-bottom: 
                2%;padding: 2%; 
                border:1px solid black"
            >
                <h1 style="display: inline"> 
                    <a href="/tasks/{{$task->id}}">{{$task->title}}</a>
                </h1>

                <div style="display: inline">
                    <a href="/tasks/{{$task->id}}/edit" 
                        style="color: RoyalBlue; font-size: 25px; margin-left: 10px"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                    </a> 
                </div>
                
                <form method="POST" 
                    action="/tasks/{{$task->id}}" 
                    style="display: inline; float: right"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        style="background-color: red; color: white; font-size: 20px;"
                    >
                        <i class="fa fa-trash"></i>
                    </button>                    
                </form>

                <div style="border: 1px groove;
                    width: 15%;
                    background-color:rgb(233, 222, 222);
                    margin: 1%;
                    font-size: 24px"
                >
                    @switch($task->status)
                        @case(0)   
                            <i>New</i>            
                            @break
                        @case(1)
                            <i>In Process</i>
                            @break
                        @case(2)
                            <i>Completed</i>
                            @break
                        @default                    
                    @endswitch
                </div>
                
                <div style="border: 1px solid black; margin: 1%">
                    <br>{{$task->description}}
                </div>                        
            </div>        
        @endforeach
    </main>
</body>
</html>