<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
    </head>
    
    <body>
        <h1>
            <ul>
                @foreach($tasks as $task)
                <li>
                    {{ $task->body }}
                </li>
                @endforeach
            </ul>
        </h1>
    </body>
</html>