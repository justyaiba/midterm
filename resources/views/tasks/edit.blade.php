@extends('layouts.app')

@section('title', 'Edit Task: ' . $task->title)

@section('content')
<div class="container mx-auto mt-8 max-w-2xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Edit Task: {{ $task->title }}</h1>

    <!-- Error Validdatiom -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
            <strong class="font-bold">Whoops!</strong> There were some problems with your input.
            <ul class="mt-1 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT') 
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input name="title" value="{{ old('title', $task->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Priority</label>
                <select name="priority" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    @foreach(['low','medium','high'] as $p)
                        <option value="{{ $p }}" {{ old('priority', $task->priority) == $p ? 'selected' : '' }}>{{ ucfirst($p) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                <select name="status" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    @foreach(['todo', 'in_progress', 'done'] as $s)
                        <option value="{{ $s }}" {{ old('status', $task->status) == $s ? 'selected' : '' }}>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Due Date</label>
                <input type="date" name="due_date" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('due_date', $task->due_date) }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <select name="category_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">-- None --</option>
                    @foreach($categories as $cat)
                        <option 
                            value="{{ $cat->id }}" 
                            {{ old('category_id', $task->category_id) == $cat->id ? 'selected' : '' }}
                        >
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3 mt-6">
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
            <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Task
            </button>
        </div>
    </form>
</div>
@endsection
