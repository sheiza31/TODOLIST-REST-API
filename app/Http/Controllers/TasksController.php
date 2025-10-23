<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Users;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
interface TasksApi {
    
    public function store(StoreTasksRequest $request):JsonResponse;
    public function show($id):JsonResponse;
    public function update(UpdateTasksRequest $request,$id):JsonResponse;
    public function destroy($id,Tasks $tasks):JsonResponse;
}

class TasksController extends Controller implements TasksApi
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tasks = Tasks::where('user_id', Auth::user()->id)->with('user')->paginate(10);
        if ($tasks->isEmpty()) {
        return response()->json([
            'status' => false,
            'error' => 'Task Tidak Ditemukan',
            'data' => null,
        ], 404);
}

       return response()->json([
            'status' => true,
            'message' => 'Resource Task Berhasil Ditemukan',
            'data' => $tasks,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request):JsonResponse
    {
        $validated = $request->validated();
        $task = Tasks::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'is_completed' => false,  
            'user_id' => Auth::user()->id,
 
        ]);

       if (!$task) {
           return response()->json(
           [
               'status' => false,
               'error' => 'Task Gagal Dibuat',
           ], 500);
       }

            return response()->json([
                'status' => true,
                'message' => 'Task Berhasil Dibuat',
                'data' => $task
            ], 201);
        }
    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
     $task = Tasks::with('user')
        ->where('user_id', Auth::id()) // ambil hanya task milik user login
        ->where('id', $id)             // cari task berdasarkan id
        ->first();  

        if (!$task) {
            return response()->json(
            [
                'status' => false,
                'error' => 'Task Tidak Ditemukan',
                'data' => null,
            ], 404
           );
        }

        return response()->json([
            'status' => true,
            'message' => 'Resource Task Berhasil Ditemukan',
            'data' => $task,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request,$id):JsonResponse
    {
        try {
            $validated = $request->validated();

            // cari task milik user login
            $task = Tasks::where('user_id', Auth::id())->find($id);

            if (!$task) {
                return response()->json([
                    'status' => false,
                    'error' => 'Task Tidak Ditemukan',
                    'data' => null,
                ], 404);
            }

            // update task
            $task->update([
                'is_completed' => $validated['is_completed'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Task Berhasil Diupdate',
                'data' => $task,
            ], 200);
        } catch (\Throwable $th) {
            // kalau ada error di try, log & return
            \Log::error('Update error:', ['error' => $th->getMessage()]);
            return response()->json([
                'status' => false,
                'error' => $th->getMessage(),
            ], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Tasks $tasks):JsonResponse
    {
    $task = Tasks::with('user')
        ->where('user_id', Auth::id()) 
        ->where('id', $id)             
        ->first();

     if (!$task) {
         return response()->json(
         [
             'status' => false,
             'error' => 'Task Tidak Ditemukan',
             'data' => null,
         ], 404
        );
     }    

     $task->delete();
        return response()->json([
            'status' => true,
            'message' => 'Task Berhasil Dihapus',
            'data' => $task
        ], 200);
}
}
