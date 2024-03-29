<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo) {
        $this->todo = $todo;
    }

    public function index() {
        $todo = new Todo();
        $todo_list = $todo->getTodos();

        return response()->json(
            $todo_list
        );
    }

    public function create(TodoRequest $request) {
        $new_todo = Todo::create([
            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'expired_at' => $request->input('expired_at'),
        ]);

        return response()->json (
            $new_todo
        );
    }
}
