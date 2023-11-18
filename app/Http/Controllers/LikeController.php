<?php

namespace App\Http\Controllers;

use App\Models\Cord;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id)
    {
        if(auth()->user()->likes()->where('cord_id',$id)->exists())
        {
           return $this->unlike($id);
        }
        $liker = auth()->user();
        $liker->likes()->attach($id);
        return redirect()->back()->with('success');
    }

    public function unlike($id)
    {
        auth()->user()->likes()->detach($id);
        return redirect()->back()->with('success');
    }
}
