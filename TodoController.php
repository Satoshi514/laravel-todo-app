<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index()
    
        //
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()
    
        //
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Goal $goal) {
        $request->validate([
            'content' => 'required',
        ]); 

        $todo = new Todo();
        $todo->content = $request->input('content');
        $todo->user_id = Auth::id();
        $todo->goal_id = $goal->id;
        $todo->done = false;
        $todo->save();

        return redirect()->route('goals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    //public function show(Todo $todo)
    
        //
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    //public function edit(Todo $todo)
    
        //
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal, Todo $todo) {
        $request->validate ([
            'content' => 'required',
        ]);

        $todo->content = $request->input('content');
        $todo->user_id = Auth::id();
        $todo->goal_id = $goal->id;
        $todo->done = $request->boolean('done', $todo->done);
        $todo->save();

        return redirect()->route('goals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal, Todo $todo) {
        $todo->delete();

        return redirect()->route('goals.index');
    }
}
