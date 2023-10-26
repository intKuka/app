<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adding Task</title>
</head>
<body>
    <form method="POST" action="/tasks">        
        @csrf 
        <div>
            <div style="padding-bottom: 2%">
                <label for="title" class="inline-block">
                    Title<br>
                </label>
                <input type="text" name="title" maxlenght=50 >

                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        
            <div style="padding-bottom: 2%">
                <label for="description" class="inline-block">
                    Description<br>
                </label>
                <textarea name="description"></textarea>

                @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div style="display: inline">               
            <button type="submit" value="Create">Create</button>

            <a href="/tasks">Cancel</a>
        </div>
    </form>      

    
       
</body>
</html>