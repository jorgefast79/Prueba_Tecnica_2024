<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RegisterUserRequest;

class UsersController extends Controller
{

    function __construct(){
        $this->middleware([
            'auth', 
            'roles:admin'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::all();
        $text = '';

        return view('users.index', compact('users', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $request)
    {
        $user = User::create($request->all());

        $user->roles()->attach($request->roles);

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $users = User::findOrFail($request->id);
        $text = '';

        return view('users', compact('users', 'text'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);


        $roles = Role::pluck('display_name', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->roles()->sync($request->roles);

        return back()->with('info', 'Usuario actalizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users');

    }

    public function search(Request $request)
    {
        $text = trim($request->get('request'));
        $users = User::where('name', 'LIKE', "%{$text}%")->get();

        return view('users.index', compact('users', 'text'));
    }
}
