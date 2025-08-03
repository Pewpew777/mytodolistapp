<x-layout>
    <div class="container  mx-auto px-4 py-8 flex flex-col gap-4">
        <div>
            <h1 class="font-semibold text-3xl"> {{$user->name}}</h1>
            <form action="{{route('deleteuserprime', $user->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete User</button>
            </form>
        </div>
        <p class="text-lg">{{$user->bio}}</p>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1  class="font-semibold text-xl text-blue-600 mb-6">Assigned Tasks:</h1>
            @if($user->todos->count()>0)
                @foreach($user->todos as $todo)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg mt-4">
                            <div class="flex items-center gap-4">
                                <span class="w-4 h-4 rounded-full {{ $todo->completed ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                                <span class="{{$todo->completed ? 'line-through text-gray-500' :'text-gray-900' }}">{{$todo->title}}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="{{ $todo->completed ? 'text-green-500' : 'text-red-500'}} text-sm sm:text-xs ">
                                {{ $todo->completed ? 'Completed' : 'Pending' }}
                                </button>
                                </form>
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class=" flex-shrink-1 bg-red-500 rounded px-4 py-1 text-sm text-white sm:px-3 sm:text-xs">Delete</button>
                                </form>
                            </div>
                        </div>
                @endforeach
            @else
                <p class="text-gray-500 italic">No todos assigned to this user.</p>
            @endif
        </div>
    </div>
    <div class="container  mx-auto px-4 py-8 flex flex-col gap-4">
        <h1 class="font-semibold text-2xl mb-6">Add a Task:</h1>
         <form action="{{ route('storetask', $user->id) }}" method="POST">
            @csrf
            <div class="space-y-1">   
            <label for="title">Add Task Title:</label>
            <input
            type="text"
            name="title"
            id="title"
            required
            placeholder="Enter task title"
            >
        </div>
        <button type="submit" class="px-10 my-4 py-2 rounded bg-blue-400 hover:bg-blue-600 text-white ">Add Task</button>
        </form>
    </div>
</x-layout>