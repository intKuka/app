<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function index() {
        return view('tasks.index', [
            'tasks'=>Task::all()
        ]);
    }

    public function show(Task $task) {
        return view('tasks.show', [
            'task'=>$task
        ]);
        
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $form = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        // TODO: make an emun
        $form['status'] = 0;
        Task::create($form);

        return redirect('/tasks');
    }
    
    public function edit(Task $task) {
        return view('tasks.edit', [
            'task'=>$task
        ]);
    }
    
    public function update(Request $request, Task $task) {
        $form = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $task->update($form);

        return view('tasks.show', [
            'task'=>$task
        ]);
    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect('/tasks');
    }
}
