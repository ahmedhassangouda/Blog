<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index' , compact('users'));
    }

    public function changerole(Request $request ,User $user)
    {
        $user->role = $request->role;
        $user->save();
        return redirect(Route('user.index'));
    }

    public function profile(User $user)
    {
        return view('users.profile' , compact('user'));
    }
}
