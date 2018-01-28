<?php

namespace App\Http\Controllers\Api;


use DB;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $taskRepository;


    public function __construct(TaskRepository $taskRepository){
        $this->taskRepository = $taskRepository;
    }



    public function index()
    {

        $tasks = $this->taskRepository->getAll();
        return response($tasks, 200);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$task = new Task();
        //$task->body = $request->input('body');
        //$task->save();
        //return response()->json(['message' => 'Task Added']);



        $attributes = $request->only(['body']);
        $this->taskRepository->create($attributes);
        return response()->json(['message' => 'Task Added']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$task = Task::find($id);
        //return response( $task , 200 );
        
        $task = $this->taskRepository->getById($id);
        return response($task,200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //$task = Task::find($id);
        //$task->body = $request->input('body');
        //$task->save();
        //return response()->json(['message' => 'Task Updated']);

        $attributes = $request->only(['body']);
        $this->taskRepository->update($id,$attributes);
        return response()->json(['message' => 'Task Updated']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$task = Task::find($id);
        //$task->delete();
        //return response()->json(['message' => 'Task Deleted']);

        $this->taskRepository->delete($id);
        return response()->json(['message' => 'Task Deleted']);
    }
}
