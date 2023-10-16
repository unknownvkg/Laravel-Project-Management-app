<?php

namespace App\Http\Controllers;
use App\Models\TaskAssign;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); 
    // }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'status' => 'required|in:1,2,3,4', // You can define validation rules based on your requirements
        ]);

        // Update the status for records where task_id is equal to $id
        TaskAssign::where('task_id', $id)->update([
            'status' => $request->input('status'),
        ]);

        // Optionally, you can retrieve and return the updated records if needed
        $updatedTasks = TaskAssign::where('task_id', $id)->get();

        return response()->json([
            'message' => 'Status updated successfully',
            'updatedTasks' => $updatedTasks,
        ]);
    }

}
