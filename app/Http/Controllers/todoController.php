<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\todo;

class todoController extends Controller
{
    public function index()
    {   
        $users = User::with('todos')->orderBy('created_at', 'desc')->get();
        return view('allusers', compact('users'));//or ['users'=>$users]
    }
    public function store(Request $request)
    {
        $validated= $request->validate([
            'name' => 'required |string|max:100',
            'bio'=>'required|string|max:255',
            'title'=>'required|string|max:255',
        ]);
        $user =user::create([
            'name'=>$validated['name'],
            'bio'=>$validated['bio'],
        ]);
        $todo =todo::create([
            'title'=>$validated['title'],
            'user_id'=>$user->id,
        ]);
        return redirect()->back('allusers')->with('success', 'User and Todo created successfully!');
    }
    public function show($id){
        $user = User::with('todos')->findOrFail($id);
        return view('showuser', compact('user'));
    }
    public function toggle(todo $todo){
        $todo->completed = !$todo->completed;
        $todo->save();
        return redirect()->back();
    }
    public function destroy($id){
        $todo =todo::findOrFail($id);
        $todo->delete();
        return redirect()->back();
    }
    public function storetask(request $request,$id){
        $user=user::findOrfail($id);
        $validated = $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $todo= todo::create([
            'title'=>$validated['title'],
            'user_id'=>$user->id,
        ]);
        return redirect()->route('showuser',$user->id);
    }
    public function deleteuser($id){
        $user=user::findOrFail($id);
        $user->delete();
        return redirect()->route('allusers');
    }
}
