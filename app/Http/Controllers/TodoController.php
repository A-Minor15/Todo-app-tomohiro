<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;

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

    public function store(Request $request) {
        Log::info($request);
        $new_todo = new Todo();

        $new_todo->name = $request->input('title');
        $new_todo->description = $request->input('description');
        $new_todo->priority = $request->input('priority');
        $new_todo->expires_at = $request->input('expires_at');
        $new_todo->save();

        $response = [
            'message' => 'Todo created successfully',
            'data' => $new_todo,
        ];

        return response()->json(
            $response,
            201
        );
    }
}
