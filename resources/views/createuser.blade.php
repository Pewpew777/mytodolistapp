<x-layout>
    <form class="p-10 space-y-4" action="{{route('storeuser')}}" method="POST">
        @csrf
        <h1 class="font-semibold text-lg">Create A New User:</h1>
        <div class="space-y-1">
            <label for="name">User name:</label>
            <input 
            type="text"
            id="name"
            name="name"
            required
            placeholder="Enter user name"
            >
        </div>
        <div class="space-y-1">
            <label for="bio"> Add a bio:</label>
            <input 
            type="text"
            id="bio"
            name="bio"
            required
            placeholder="Enter user bio"
            >
        </div>
    
        <div class="space-y-1">   
            <label for="title">Add a task:</label>
            <input
            type="text"
            name="title"
            id="title"
            required
            placeholder="Enter task title"
            >
        </div>
        <button type="submit" class="px-10 my-4 py-2 rounded bg-blue-400 hover:bg-blue-600 text-white ">Add User</button>
    </form>
</x-layout>