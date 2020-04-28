<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of the users.
    public function index(Request $request)
    {
        $this->authorize('index', $request->user());

        $users = User::all();

        return view('users.index', [
            'users' => $users,
        ]);
    }

    //Store a newly created user in storage.
    public function store(Request $request)
    {
        $this->authorize('store', $request->user());

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin == 'on' ? true : false
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created.');
    }

    //Update the specified user in storage.
    public function update(Request $request)
    {
        $this->authorize('update', $request->user());

        $this->validate($request, [
            'id' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = $request->is_admin == 'on' ? true : false;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User updated.');
    }

    //Remove the specified user from storage.
    public function destroy(Request $request, int $user_id)
    {
        $this->authorize('destroy', $request->user());

        $user_to_destroy = User::find($user_id);
        $user_to_destroy->delete();

        return redirect()->route('users.index')
            ->with('success', 'User removed.');
    }
}
