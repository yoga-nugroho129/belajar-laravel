<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        return redirect('/tasks');
    }

    public function update(Task $task)
    {
        Gate::authorize('update', $task);

        $task->update([
            'is_completed' => true,
        ]);

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
