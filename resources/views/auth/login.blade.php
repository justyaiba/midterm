<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>

<body>
<h1 class="bg-linear-to-r from-green-900 to-green-100 bg-clip-text text-center pt-20 text-6xl font-mono font-bold text-transparent">LOGIN</h1>

<div class="container mx-auto mt-11 max-w-md p-7 bg-white rounded-lg shadow-lg">

  <form class="login-form" id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
    @csrf

    <label class="font-mono text-lg" >Email</label><br>
    <input 
    class="border border-gray-300 
    rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full" 
    type="email" 
    name="email" required autocomplete="email"><br><br>

    <label class="font-mono text-lg">Password</label><br>
    <input 
    class="border border-gray-300 
    rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full" 
    type="password" 
    name="password" required autocomplete="current-password"><br><br>

    <div class="mb-4">
    <div class="flex items-center">
        <div class="grow border-t border-gray-400"></div>

        <span class="mx-4 text-sm text-gray-500">
            Or create an account?
            <a href="/register" class="text-blue-500 hover:text-blue-800 font-medium">Register</a>
        </span>

        <div class="grow border-t border-gray-400"></div>
    </div>
    </div>

    <button type="submit"
    class="bg-green-500 hover:bg-green-600 text-white font-mono font-bold py-2 px-4 rounded w-full"
    >Login</button>
    
  </form>
</div>

</body>
</html>
