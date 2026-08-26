<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Todo List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .task {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 12px;
        }

        .task-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .task-description {
            color: #666;
            margin-bottom: 10px;
        }

        .completed {
            color: green;
        }

        .pending {
            color: orange;
        }
    </style>
</head>

<body>

    <h1>Todo List</h1>

    @foreach ($tasks as $task)

        <div class="task">

            <div class="task-title">
                {{ $task->title }}
            </div>

            <div class="task-description">
                {{ $task->description }}
            </div>

            @if ($task->is_completed)

                <div class="completed">
                    ✓ Completed
                </div>

            @else

                <div class="pending">
                    ○ Not completed
                </div>

            @endif

        </div>

    @endforeach

</body>
</html>