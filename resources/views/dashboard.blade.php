@extends('layouts.app')

@section('title', 'Dashboard - Backlog')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800 font-mono">Dashboard</h1>

    <!-- Search box -->
    <form method="GET" action="{{ route('dashboard') }}" class="w-1/3">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search task..."
               class="border rounded-lg px-3 py-2 w-full font-mono focus:ring-2 focus:ring-green-400">
    </form>
</div>

<form method="GET" action="{{ route('dashboard') }}" class="flex gap-3 mb-4 font-mono">

    <select name="status" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400">
        <option value="">All Status</option>
        <option value="todo" {{ request('status') == 'todo' ? 'selected' : '' }}>Todo</option>
        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
    </select>

    <select name="priority" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-400">
        <option value="">All Priority</option>
        <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
    </select>

    <button type="submit"
        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
        Apply
    </button>

    <a href="{{ route('dashboard') }}"
       class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow-md">
       Reset
    </a>

    <a href="{{ route('tasks.create') }}"
       class="ml-auto bg-green-400 hover:bg-green-500 text-white font-semibold py-2 px-4 rounded-lg">
       + Add Task
    </a>
</form>

<div class="bg-white rounded-lg shadow overflow-x-auto font-mono">
    <table class="min-w-full table-auto border-collapse">
        <thead class="bg-gray-400 text-white">
            <tr>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Priority</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Due Date</th>
                <th class="px-4 py-2 text-left">Category</th>
                <th class="px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2 font-medium text-gray-800">{{ $task->title }}</td>
                <td class="px-4 py-2">{{ ucfirst($task->priority) }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded
                        @if($task->status == 'todo') bg-yellow-100 text-gray-700
                        @elseif($task->status == 'in_progress') bg-blue-100 text-blue-700
                        @else bg-green-100 text-green-700 @endif">
                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $task->due_date ?? '-' }}</td>
                <td class="px-4 py-2">{{ $task->category->name ?? '-' }}</td>
                <td class="px-4 py-2 text-center">
                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold px-3 py-1 rounded-md mr-1">
                       Edit
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Delete this task?')"
                                class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-3 py-1 rounded-md">
                                Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                    No tasks found. Add your first task!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
