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

    public function edit($id) {
        $edit_todo = $this->todo->findOrFail($id);

        return response()->json(
            $edit_todo
        );
    }

    public function update(Request $request, $id) {
        $update_todo = $this->todo->findOrFail($id);

        Log::info($this->todo->findOrFail($id));

        $update_todo->name = $request->input('title');
        $update_todo->description = $request->input('description');
        $update_todo->priority = $request->input('priority');
        $update_todo->expires_at = $request->input('expires_at');
        $update_todo->save();

        $response = [
            'message' => 'Todo updated successfully',
            'data' => $update_todo,
        ];

        return response()->json(
            $response,
            204
        );
    }

    public function destroy($id) {
        $this->todo->destroy($id);

        $response = [
            'message' => 'Todo Deleted.',
        ];

        return response()->json(
            $response,
            204
        );
    }

}
