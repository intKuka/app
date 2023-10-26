<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$task->title}}</title>
</head>
<body>
    <div style="padding-bottom: 2%">
            <label for="title" class="inline-block">
                Title:<br>
            </label>
            <input type="text" name="title" value="{{$task->title}}" disabled >
    </div>

    <div style="padding-bottom: 2%">
        <label for="status" class="inline-block">
            Status:<br>
        </label>
        @switch($task->status)
            @case(0)
            <input type="text" name="status" value="New" disabled >
                @break
            @case(1)
            <input type="text" name="status" value="In Process" disabled >
                @break
            @case(2)
            <input type="text" name="status" value="Completed" disabled >
                @break
            @default  
            <input type="text" name="status" value="Unknown" disabled >
        @endswitch 
    </div>

    <div style="padding-bottom: 2%">
        <label for="description" class="inline-block">
            Description:<br>
        </label>
        <textarea name="description" disabled>{{$task->description}}</textarea>
    </div>

    <div>
        <form action="/tasks" style="display: inline">
            <input type="submit" value="Back" />
        </form>
    </div>
</body>
</html>