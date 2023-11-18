<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Cord;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $q = Cord::with('user','comments.user')->orderBy('created_at','desc');


        if(request()->has('search'))
        {
            $q->where('content','like', '%'. request()->get('search') .'%');
        }

        $cords = $q->paginate(3)->appends(['search'=>request()->get('search')]);
        
        return view('dashboard',compact('cords'));
    }

    public function terms()
    {
        return view('terms');
    }
} 