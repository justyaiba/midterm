<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request){
    $query = Task::where('creator_id', Auth::id())->with('category');

    // Search
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    $tasks = $query->get();
    $categories = Category::all();

    return view('tasks.index', compact('tasks', 'categories'));
}

    public function dashboard(Request $request) {
    $query = Task::where('creator_id', Auth::id())->with('category');

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('priority')) {
        $query->where('priority', $request->priority);
    }

    $tasks = $query->latest()->get();

    return view('dashboard', compact('tasks'));
}



    public function create() {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'todo',
            'due_date' => $request->due_date,
            'creator_id' => Auth::id(),
            'assigned_to' => $request->assigned_to,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->only('title', 'description', 'priority', 'status', 'due_date', 'category_id'));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
