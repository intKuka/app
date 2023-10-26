<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$task->title}}</title>
</head>
<body>
    <form method="POST" action="/tasks/{{$task->id}}">
        @csrf
        @method('PUT')
        <div style="padding-bottom: 2%">
            <label for="title" class="inline-block">
                Title<br>
            </label>
            <input type="text" name="title" value="{{$task->title}}" maxlenght=50 >

            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
 
        <div style="padding-bottom: 2%">
            <label for="status" class="inline-block">
                Status<br>
            </label>
            <select name="status">            
                @switch($task->status)
                    @case(0)
                        <option id="new" value=0 selected>New</option>>
                        <option id="inProcess" value=1>In Process</option>>
                        <option id="completed" value=2>Completed</option>>                    
                        @break
                    @case(1)
                        <option id="new" value=0>New</option>>
                        <option id="inProcess" value=1 selected>In Process</option>>
                        <option id="completed" value=2>Completed</option>>
                        @break
                    @case(2)
                        <option id="new" value=0>New</option>>
                        <option id="inProcess" value=1>In Process</option>>
                        <option id="completed" value=2 selected>Completed</option>>
                        @break
                    @default                    
                @endswitch
            </select>   
        </div>
        
        <div style="padding-bottom: 2%">
            <label for="description" class="inline-block">
                Description<br>
            </label>
            <textarea name="description">{{$task->description}}</textarea>

            @error('description')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div style="display: inline">               
            <button type="submit" value="Save">Save</button>

            <a href="/tasks">Cancel</a>
        </div>
    </form>
</body>
</html>