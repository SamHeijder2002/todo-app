<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ownTasks = $user->tasks;
        $assignedTasks = Task::where('assigned_user_id', $user->id)->get();
        return view('tasks.index', compact('ownTasks', 'assignedTasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Te doen,In uitvoering,Voltooid',
            'assigned_user_id' => 'nullable|exists:users,id|different:user_id',
        ]);

        Auth::user()->tasks()->create($request->all());

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Te doen,In uitvoering,Voltooid',
            'assigned_user_id' => 'nullable|exists:users,id|different:user_id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function complete(Task $task)
    {
        $task->status = 'Voltooid';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }
}
