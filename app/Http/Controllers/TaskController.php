<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        Task::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'is_completed'=> false,
        ]);

        return redirect('/tasks');
    }

    public function update(Task $task)
    {
        $task->update([
            'is_completed' => true,
        ]);

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }
}
