<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adding Task</title>
</head>
<body>
    <header>        
        <div class="container">
            @extends('layouts.layout')
        </div>
    </header>
    <main>
    @section('content')    
        <div class="mt-5 display-5" style="margin-left: 2%"> 
            <a href="/tasks">
                <button type="button" class="btn btn-dark">
                    <i class="bi bi-arrow-return-left"> Cancel</i>
                </button>
            </a>         
        </div>    
        <form method="POST" action="/tasks">
            @csrf
            <div class="form-row justify-content-center py-3">
              <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">

                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
            </div>

            <div class="form-row justify-content-center py-3">
                <div class="form-group col-md-12">
                    <label class="col-md-12 text-center">Description</label>
                    <textarea class="form-control justify-content-center span6 m-auto w-50" name="description" placeholder="Describe your task" rows="5"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">                
                <button type="submit" class="btn btn-primary btn-lg">Create</button>
            </div>                                    
        </form>  
    @endsection  
    </main>      
</body>
</html>