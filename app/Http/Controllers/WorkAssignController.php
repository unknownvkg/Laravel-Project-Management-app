<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addUser;
use App\Models\TaskAssign;


class WorkAssignController extends Controller
{
    public function giveTask($id){
        $user = addUser::find($id);
        return view('user.giveTask',['user' => $user]);
    }
    public function addTask(Request $request)
    {     //function 3
       
        $addTask = new TaskAssign; 
        $addTask->user_id = $request->user_id;
        $addTask->project_name = $request->project_name;
        $addTask->project_title = $request->project_title;
        // $CustomaddTaskSystem->gender = $request->gender;
        $addTask->descripation = $request->descripation;

        $addTask->save();
        return redirect()->back()->with('success', 'Task Assigned successfully');
       
    }

 
}
