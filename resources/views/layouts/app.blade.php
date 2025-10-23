<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager')</title> 
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <nav class="relative bg-green-400 shadow-md">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                    </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                @php
                                    $baseClasses = "rounded-md px-3 py-2 text-sm font-medium";
                                    $activeClasses = "bg-green-600 text-white";
                                    $defaultClasses = "text-gray-50 hover:bg-green-500 hover:text-white";
                                @endphp

                                
                                <!-- Dashboard -->
                                <a href="{{ route('dashboard') }}" 
                                class="{{ $baseClasses }} {{ Request::routeIs('dashboard') ? $activeClasses : $defaultClasses }}">
                                    Dashboard
                                </a>
                                <!-- Task -->
                                <a href="{{ route('tasks.index') }}" 
                                class="{{ $baseClasses }} {{ Request::routeIs('tasks.*') ? $activeClasses : $defaultClasses }}">
                                    Task
                                </a>
                                <!-- Categories -->
                                <a href="{{ route('categories.index') }}" 
                                class="{{ $baseClasses }} {{ Request::routeIs('categories.*') ? $activeClasses : $defaultClasses }}">
                                    Categories
                                </a>
                            </div>
                        </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:ml-6 sm:pr-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white bg-green-400 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        @yield('content') 
    </main>
    
</body>
</html>