<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\User;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getprofile(User $user)
    {
        $posts = $user->posts();
        return view('users.profile' , compact(['user' , 'posts']));
    }

    public function edit(User $user)
    {
        $profile = $user->profile;
        return view('users.editprofile' , compact('profile'));
    }
    
    public function update(ProfileRequest $request , Profile $profile)
    {
        
        $data = $request->all();        
        if ($request->hasFile('pic'))
        {
            if($profile->pic !== NULL)
            {
            Storage::disk('public')->delete($profile->pic);
            }            
            $pic = $request->pic->store('profilepic','public');
            $data['pic'] = $pic; 
        }

        $profile->update($data);
        return redirect(Route('user.profile' , Auth::user()->id))->with('success' , 'Profile Info Update Successfuly');
    }
}
