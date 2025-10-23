@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<div class="container mx-auto mt-8 font-mono">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Task List</h1>
        <a href="{{ route('tasks.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md"> + New Task
        </a>
    </div>


    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Priority</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Due</th>
                    <th class="px-4 py-2 text-left">Category</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $task->title }}</td>
                        <td class="px-4 py-2">{{ ucfirst($task->priority) }}</td>
                        <td class="px-4 py-2">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</td>
                        <td class="px-4 py-2">{{ $task->due_date ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $task->category->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold px-3 py-1 rounded-md mr-1">Edit</a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Delete this task?')"
                                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-3 py-1 rounded-md">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-4 text-center text-gray-500">No tasks yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
