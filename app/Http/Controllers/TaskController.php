<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(){
        $tasks = Tasks::all();
        return view('task.index', compact('tasks'));
    }


    public function store(Request $request){

        $request->validate([
            'description' => 'required',
        ]);
        Tasks::create([
            'description' => $request->description,
            'created_at' => now(),
        ]);
        return back()->with('success','Task Added Successfully!');

    }

    public function status($id){
        $task = Tasks::where('id',$id)->first();
        if($task->status == 'active'){
            Tasks::find($task->id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('error', 'You have not completed this!');
        }else{
            Tasks::find($task->id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('success', 'Congratulations! You have done this!');

        }
    }

    public function edit($id){
        $task = Tasks::where('id',$id)->first();

        return view('task.edit',compact('task'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'description' => 'required',
        ]);
        Tasks::find($id)->update([
            'description' => $request->description,
            'updated_at' => now(),
        ]);
        return redirect('/')->with('success','Task updated successfully!');
    }



    public function delete($id){
        Tasks::find($id)->delete();
        return back()->with('success', 'Task has been deleted!');
    }
}
