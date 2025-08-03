<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY To Do App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
   <header>
    <nav class="flex flex-row justify-between items-center bg-blue-100 py-4 px-10">
        <h1 class="font-semibold">My To Do App</h1>
            <div class="flex flex-row gap-10">
            <a href="{{ route('allusers') }}">
                <button class="font-semibold">All Users</button>
            </a>
            <a href="{{route('createuser')}}">
                <button class="font-semibold">Add A User</button>
            </a>
            </div>
    </nav>
    </header> 
    <main class="container mx-auto px-4 py-8 bg-gray-50 min-h-screen">
        {{$slot}}
    </main>
</body>
</html>