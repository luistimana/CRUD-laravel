<?php

namespace App\Http\Controllers;

use App\Task;
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
     /**
     * Eliminar vista de edición
     *
     * @param  Task id  $id
     * @return Response
     */
    public function editView($id)
    {
        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }

        return view('tasks.edit', ['task' => $task]);
    }

     /**
     * Edite la tarea dada.
     *
     * @param  Request  $request
     * @param  Task id  $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }

        $task->title = $request->title;
        $task->save();
        return redirect('/tasks');
    }
     /**
     * Elimina la tarea dada.
     *
     * @param  Task id  $id
     * @return Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if (empty($task)) {
            return redirect('/tasks');
        }

        $task->delete();
        return redirect('/tasks');
    }
}
