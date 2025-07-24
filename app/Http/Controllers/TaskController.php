<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all tasks
    public function index()
    {
        $tasks = Task::with(['club', 'assignee'])->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show create form
    public function create()
    {
        $clubs = Club::all();
        $users = User::all();
        return view('tasks.create', compact('clubs', 'users'));
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'club_id'     => 'required|exists:clubs,id',
            'assigned_to' => 'nullable|exists:users,id',
            'deadline'    => 'nullable|date',
        ]);

        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'club_id'     => $request->club_id,
            'assigned_to' => $request->assigned_to,
            'deadline'    => $request->deadline,
            'status'      => 'pending',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Show single task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show edit form
    public function edit(Task $task)
    {
        $clubs = Club::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'clubs', 'users'));
    }

    // Update task
    public function update(Request $request, Task $task)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|in:pending,completed',
        ]);

        $task->update($request->only('title', 'description', 'status'));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
