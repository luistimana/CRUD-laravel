<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Muestra una lista de todas las tareas del usuario.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request){

        $tasks = $request->user()->tasks()->orderBy('created_at', 'DESC')->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Crea una nueva tarea.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title
        ]);

        return redirect('/tasks');
    }
}
