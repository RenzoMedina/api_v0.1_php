<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            "message"=> "All data",
            "data"=> $tasks,
            "status"=>"200"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task=Task::create($request->all());
        return response()->json([
            "message"=> "Created data",
            "data"=> $task,
            "status"=>"200"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task = Task::query()->where("id", $task->id)->first();
        return response()->json([
            "message"=> "Data of Id",
            "data"=> $task,
            "status"=>"201"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json([
            "message"=> "Updated data",
            "data"=> $task,
            "status"=>"204"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            "message"=> "Destroyed data",
            "data"=> $task,
            "status"=>"205"
        ]);
    }
}
