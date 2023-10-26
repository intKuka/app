<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller {
    public function index() {
        $tasks = Task::all();
        return $tasks;
    }

    public function show($id) {
        
        return response()->json(Task::find($id));     
    }

    public function store(Request $request) {
        $form = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        // TODO: make an emun
        $form['status'] = 0;
        Task::create($form);

        return response()->json(data:$form, status:201);
    }
    
    public function update(Request $request, $id) {
        $form = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $task = Task::find($id);
        $task->update($form);
        return response()->json(data: $task);
    }

    public function destroy($id) {
        $task = Task::find($id);
        $task->delete();
        return response("Successfully removed the task with Id: {$id}");
    }
}