<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class UpdateController extends Controller
{
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->validated());

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task
        ], 200);
    }
}
