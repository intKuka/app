<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$task->title}}</title>
</head>
<body>
    <header>        
        <div class="container">
            @extends('layouts.layout')
        </div>
    </header>
    @section('content')
        <div class="mt-5 display-5" style="margin-left: 2%"> 
            <a href="/tasks">
                <button type="button" class="btn btn-dark">
                    <i class="bi bi-arrow-return-left"> Cancel</i>
                </button>
            </a>         
        </div>

        <div class="form-row justify-content-center py-3">
            <div class="form-group col-md-4">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{$task->title}}" disabled >
            </div>
            <div class="form-group col-md-2">
                <label for="title">Status</label>
                @switch($task->status)
                    @case(0)
                    <input class="form-control" type="text" name="status" value="New" disabled >
                        @break
                    @case(1)
                    <input class="form-control" type="text" name="status" value="In Process" disabled >
                        @break
                    @case(2)
                    <input class="form-control" type="text" name="status" value="Completed" disabled >
                        @break
                    @default  
                @endswitch
            </div>
        </div>

        <div class="row justify-content-center py-3">
            <div class="col-md-5 text-center">
                <a href="/tasks/{{$task->id}}/edit">                
                    <button type="submit" class="btn btn-primary btn-lg inline ">Edit</button>  
                </a>                      
            </div> 
        </div>

        <div class="form-row justify-content-center py-3">
            <div class="form-group col-md-12">
                <label class="col-md-12 text-center">Description</label>
                <textarea class="form-control justify-content-center span6 m-auto w-50" name="description" disabled>{{$task->description}}</textarea>
            </div>
        </div>
    @endsection
</body>
</html>

 