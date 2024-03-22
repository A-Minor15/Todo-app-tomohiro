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

    public function create(Request $request) {
        $validate = [
            'name' => 'required|max:50',
            'description' => 'nullable|max:255',
            'priority' => 'nullable|in:low, middle, high',
            'expired_at' => 'nullable|date',
        ];

        $request->validate($validate);

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
