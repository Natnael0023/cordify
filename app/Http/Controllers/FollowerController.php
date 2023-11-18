<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)
    {

        if(auth()->user()->followings()->where('user_id',$user->id)->exists())
        {
            return redirect()->back()->with('error', 'You are already follower of  '.$user->name);
        }

        $follower = auth()->user();

        $follower->followings()->attach($user->id);

        return redirect()->route('users.show',compact('user'))->with('success','you have started following '.$user->name);
    }

    public function unfollow(User $user)
    {
        auth()->user()->followings()->detach($user->id);

        return redirect()->route('users.show',compact('user'))->with('success','you have unfollowed '. $user->name);
    }
}
