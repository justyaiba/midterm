@extends('layouts.app')

@section('title', 'Category Management')

@section('content')
<div class="container mx-auto mt-8 font-mono">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Category List</h1>
        <a href="{{ route('categories.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
            + Add Category
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
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Description</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-mono text-gray-600">{{ $category->id }}</td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $category->name }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $category->description }}</td>
                        <td class="px-4 py-2 text-center whitespace-nowrap">

                            <!-- edit -->
                            <a href="{{ route('categories.edit', $category->id) }}" 
                            class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold px-3 py-1 rounded-md mr-2">
                                Edit
                            </a>
                            
                            <!-- delete -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-3 py-1 rounded-md" 
                                    onclick="return confirm('Are you sure you want to delete the category: {{ $category->name }}?')">
                                    Delete
                                </button>
                            </form>


                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            No categories defined yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection