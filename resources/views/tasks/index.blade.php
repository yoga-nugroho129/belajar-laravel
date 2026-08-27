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

            form {
                margin-bottom: 40px;
            }

            input,
            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 12px;
                box-sizing: border-box;
            }

            button {
                padding: 10px 20px;
                cursor: pointer;
                background-color: teal;
                color: aliceblue;
                border-radius: 10px;
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
        <div style="display: flex; justify-content: space-between; ">
            <h1>Todo List</h1>
            <form action="/logout" method="POST">
                <button type="submit" style="background-color: crimson">Logout</button>
            </form>
        </div>
        <h2>Add New Task</h2>
        <form action="/tasks" method="POST">
            @csrf
            <div>
                <label for="title">Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Enter task title"
                >
            </div>

            <div>
                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task description"
                    rows="4"
                ></textarea>
            </div>

            <button type="submit">
                Add Task
            </button>
        </form>

        <hr>

        <h2>Tasks</h2>
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
                    <form action="/tasks/{{ $task->id }}" method="POST" style="margin-bottom: 0">
                        @csrf
                        @method('PATCH')

                        <button type="submit">
                            Mark as Completed
                        </button>
                    </form>
                @endif
                <form action="/tasks/{{ $task->id }}" method="POST" style="margin-bottom: 0">
                    @csrf
                    @method('DELETE')

                    <button type="submit" style="background-color: crimson">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach

    </body>
</html>