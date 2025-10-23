@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 font-mono">
    <h1 class="text-2xl font-bold mb-4">Add Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Name</label>
            <input type="text" name="name" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="border rounded w-full p-2"></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
