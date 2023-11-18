<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Extension\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $userCords = $user->cords()->paginate(3);
        // echo $userCords;
        return view('users.show', compact('user','userCords'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $userCords = $user->cords()->paginate(3); 

        return view('users.edit',compact('user','userCords'));
    }

    public function update(User $user)
    {
        $avtrName = null;
        if(request()->hasFile('avatar'))
        {
            if($user->avatar != null)
            {
                $oldAvtrPath = 'images/avtrs/'.$user->avatar;
                unlink($oldAvtrPath);
            }
            $avtr = request('avatar');
            $avtrName = 'avtr_'.time().'.'.request('avatar')->extension();
            $avtr->move(public_path('images/avtrs/'),$avtrName);
            $user->avatar = $avtrName;
        }
        $validated = request()->validate([
            'name' => 'required|min:2',
            'bio' => 'max:100|nullable',
        ]);

        $user->update($validated);
 
        $user->save();

        $userCords = $user->cords()->paginate(3); 
        return redirect()->route('users.show',$user);
    }
 
    public function destroy(string $id)
    {
        //
    }

    public function profile(User $user)
    {   
        return $this->show(auth()->user());
    }
}
