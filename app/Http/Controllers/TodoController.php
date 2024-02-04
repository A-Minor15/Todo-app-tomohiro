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
}
