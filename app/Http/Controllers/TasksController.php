<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function index() {
        return view('tasks.index', [
            'tasks'=>Task::filter(request('category'))->get()
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
            'description' => 'sometimes'
        ]);
        $form['status'] = Category::category['new'];
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
            'description' => 'sometimes'
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
