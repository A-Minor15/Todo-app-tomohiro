<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public function getTodos() {
        $todos = $this->select('id', 'name', 'description', 'priority', 'expires_at', 'created_at')->get();

        return $todos;
    }
}
