<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Register</title>
</head>
<body>

<h1 class="bg-linear-to-r from-green-900 to-green-100 bg-clip-text text-center pt-20 text-6xl font-mono font-bold text-transparent">REGISTER</h1>

<div class="container mx-auto mt-11 max-w-md p-7 bg-white rounded-lg shadow-lg">

  <form method="POST" action="{{ route('register') }}" >
    @csrf
    <label class="font-mono text-lg" >Name</label><br>
    <input 
    class="border border-gray-300 
    rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full" 
    type="text" 
    name="name" required><br><br>

    <label class="font-mono text-lg">Email</label><br>
    <input type="email"
    class="border border-gray-300 
    rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full"  
    name="email" required
    ><br><br>

    <label class="font-mono text-lg">Password</label><br>
    <input type="password" 
    class="border border-gray-300 
    rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full" 
    name="password" required><br><br>

    <label class="font-mono text-lg">Confirm Password</label><br>
    <input type="password" 
    class="border border-gray-300 
    rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full" 
    name="password_confirmation" required><br><br>

    <div class="mb-4">
    <div class="flex items-center">
        <div class="grow border-t border-gray-400"></div>

        <span class="mx-4 text-sm text-gray-500">
            Or have an account?
            <a href="/login" class="text-blue-500 hover:text-blue-800 font-medium">Login</a>
        </span>

        <div class="grow border-t border-gray-400"></div>
    </div>
    </div>


    <button type="submit"
    class="bg-green-500 hover:bg-green-600 text-white font-mono font-bold py-2 px-4 rounded w-full"
    >Register</button>
  
  </form>


</div>



</body>
</html>
