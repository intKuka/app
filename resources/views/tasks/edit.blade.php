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
        <form method="POST" action="/tasks/{{$task->id}}">
            @csrf
            @method('PUT')
            <div class="form-row justify-content-center py-3">
                <div class="form-group col-md-4">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$task->title}}" placeholder="Title">
    
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>               
                <div class="form-group col-md-2">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                        @switch($task->status)
                            @case(0)
                                <option id="new" value=0 selected>New</option>>
                                <option id="in_process" value=1>In Process</option>>
                                <option id="completed" value=2>Completed</option>>                    
                                @break
                            @case(1)
                                <option id="new" value=0>New</option>>
                                <option id="in_process" value=1 selected>In Process</option>>
                                <option id="completed" value=2>Completed</option>>
                                @break
                            @case(2)
                                <option id="new" value=0>New</option>>
                                <option id="in_process" value=1>In Process</option>>
                                <option id="completed" value=2 selected>Completed</option>>
                                @break
                            @default                    
                        @endswitch
                    </select>
                </div>
            </div> 
            <div class="form-row justify-content-center py-3">
                <div class="form-group col-md-12">
                    <label class="col-md-12 text-center">Description</label>
                    <textarea class="form-control justify-content-center span6 m-auto w-50" name="description" placeholder="Describe your task" rows="5">
                        {{$task->description}}
                    </textarea>
                </div>
            </div>
            <div class="row justify-content-center py-3">
                <div class="col-md-5 text-center">                
                    <button type="submit" class="btn btn-primary btn-lg inline">Save</button>                    
                </div> 
            </div>
        </form>
    @endsection
</body>
</html>