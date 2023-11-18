<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Cord;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Cord $cord)
    {
        $validated = request()->validate([
            'content'=> 'required|max:255',
        ]);


        $comment = new Comment();
        $comment->cord_id = $cord->id;
        $comment->user_id = auth()->id();
        $comment->content = $validated['content'];
        $comment->save();

        return redirect()->route('cord.show',$cord->id)->with('success','comment posted');
    }
}
