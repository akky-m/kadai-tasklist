<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        return view('welcome', $data);
    }


    public function create()
    {
        $task = new Task;

        return redirect('/');
        
 
    }


    public function store(Request $request)
 {
           $this->validate($request, [
            'status' => 'required|max:10', 
            'content' => 'required'
        ]);
        

             $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return back();
    }



    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    

    public function edit($id)
    {
      $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, $id)
        {
           $this->validate($request, [
            'status' => 'required|max:10',   
            'content' => 'required'
        ]);
        
        $task = Task::find($id);
        $task->content = $request->content;
        $task->status = $request->status;   
        $task->save();

        return redirect('/');
    }

   public function destroy($id)
   {
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
    
}
