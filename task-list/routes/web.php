<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
// use App\Models\Task;

    class Task
    {
        public function __construct(
            public int $id,
            public string $title,
            public string $description,
            public ?string $long_description,
            public bool $completed,
            public string $created_at,
            public string $updated_at
        ) {
        }
    }

    // arrray of objects
    $tasks = [
        new Task(
            1,
            'Buy groceries',
            'Task 1 description',
            'Task 1 long description',
            false,
            '2023-03-01 12:00:00',
            '2023-03-01 12:00:00'
        ),
        new Task(
            2,
            'Sell old stuff',
            'Task 2 description',
            null,
            false,
            '2023-03-02 12:00:00',
            '2023-03-02 12:00:00'
        ),
        new Task(
            3,
            'Learn programming',
            'Task 3 description',
            'Task 3 long description',
            true,
            '2023-03-03 12:00:00',
            '2023-03-03 12:00:00'
        ),
        new Task(
            4,
            'Take dogs for a walk',
            'Task 4 description',
            null,
            false,
            '2023-03-04 12:00:00',
            '2023-03-04 12:00:00'
        ),
    ];

Route::get('/', function() {
    return redirect()->route('task.index');
});

Route::get( '/tasks', function ()  {
    $tasks = \App\Models\Task::latest()->get();

    return view('index', [
        'tasks' => $tasks
    ]);
})->name('task.index');

Route::get('/tasks/{id}', function($id)  {
    $task = \App\Models\Task::findOrFail($id);

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

