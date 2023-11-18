<?php
namespace App\Http\Controllers;

use App\Models\Cord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CordController extends Controller
{
    public function store(Request $request)
    {
        $validated = request()->validate([
            'content'=> 'required|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        $cord =  Cord::create( $validated );
        
        $cord->save();

        return redirect(route('index'))->with('success','Cord created successfully');
    }

    // Route model binding V
    public function destroy(Cord $cord)
    {   
        if(auth()->id() != $cord->user_id){

            abort(403);
        }

        $cord->delete();
        return redirect()->back()->with('success','cord deleted');
    }

    public function show(Cord $cord) 
    {
        return view('show',compact('cord'));
    }

    public function edit(Cord $cord)
    {
        if(auth()->id() != $cord->user_id){
            abort(403);
        }
        $editingCord = true;
        return view('show',compact('cord','editingCord'));
    }

    public function update(Cord $cord)
    {
        if(auth()->id() != $cord->user_id){
            abort(403);
        }
        $cord->update([
            'content'=> request()->get('content')
        ]);

        return redirect(route('cord.show',compact('cord')))->with('success','cord updated successfully');
    }
}