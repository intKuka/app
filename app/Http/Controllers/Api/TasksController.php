<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller {
    public function index() {
        $tasks = Task::all();
        return $tasks;
    }

    public function show($id) {
        
        return response()->json(Task::find($id));     
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [            
            'title' => 'required',
            'description' => 'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {            
            $task = Task::create($request->all());
            $task['status'] = Category::category['new'];
            return response()->json($task, 201);
        }
    }
    
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [            
            'title' => 'required',
            'status' => 'required|numeric|digits:1|between:0,2',
            'description' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {            
            $task = Task::find($id);
            $task->update($request->all());
            return response()->json($task);
        }        
    }

    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        return response("Successfully removed the task with Id: {$id}");
    }
}