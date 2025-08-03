<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-6">Current Users:</h2>
        
        @foreach ($users as $user)
        <a href="{{route('showuser',$user->id)}}">
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold mb-4 text-blue-600">{{ $user->name }}</h3>
                    <form action="{{route('deleteuser', $user->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete User</button>
                    </form>
                </div>
                @if($user->todos->count() > 0)
                    <h4 class="text-lg font-medium mb-3 text-gray-700">Assigned Todos:</h4>
                    <div class="space-y-2">
                        @foreach ($user->todos as $todo)
                            <div class="flex gap-10 justify-between items-center p-3 bg-gray-50 rounded-lg wrap">
                                
                                    <div class="flex items-center gap-4">
                                        <span class="w-4 h-4 rounded-full {{ $todo->completed ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                                        <span class="{{ $todo->completed ? 'line-through text-gray-500' : 'text-gray-800' }} sm:text-sm">
                                        {{ $todo->title }}
                                        </span>
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
                    </div>
                @else
                    <p class="text-gray-500 italic">No todos assigned to this user.</p>
                @endif
            </div>
        </a>
        @endforeach
        </div>
        @if($users->count() == 0)
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">No users found.</p>
            </div>
        @endif
</x-layout>