<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function() {
    return redirect()->route('task.index');
});

Route::get( '/tasks', function ()  {
    $tasks = Task::latest()->get();

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('task.index');

Route::get('/tasks/{id}', function($id)  {
    $task = Task::findOrFail($id);

    // Instead this you can use findOrFail()
    // if(!$task) {
    //     abort(404, 'Task not found');
    // }

    return view('show', [
        'task' => $task
    ]);
    
})->name('task.show');




// Route Fallback
Route::fallback(function() {
    return 'Still got somewhere';
});

// GET - read data, fetch documents
// POST - Store new data, send forms. POST will generally create something on the server. 
// PUT - modify an existing thing
// DELETE - delete data

