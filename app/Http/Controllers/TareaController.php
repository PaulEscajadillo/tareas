<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tareas.index', [
            'tareas' => Tarea::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTareaRequest $request)
    {
        Tarea::create($request->all());
        return redirect()->route('tareas.index')
                ->withSuccess('Una nueva tarea fue añadida con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', [
            'tarea' => $tarea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {        
        $user = \Auth::user();
        if ($user) {
            if ($user->dni == $tarea->dni) {
                return view('tareas.edit', [
                    'tarea' => $tarea
                ]);
        }
            else {
                return response(view('errors.403'),403);
            }
        } 
        else {
            return response(view('errors.403'),403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, Tarea $tarea)
    {
        $user = \Auth::user();
        if ($user) {
            if ($user->dni == $tarea->dni) {
                $tarea->update($request->all());
        }
            else {
                return response(view('errors.403'),403);
            }
        } 
        else {
            return response(view('errors.403'),403);
        }        
        /*return redirect()->back()
                ->withSuccess('La tarea fue actualizada con éxito.');*/
        return redirect()->route('tareas.index')
                ->withSuccess('La tarea fue actualizada con éxito.');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $user = \Auth::user();
        if ($user) {
            if ($user->dni == $tarea->dni) {
                $tarea->delete();
                return redirect()->route('tareas.index')
                ->withSuccess('La tarea fue eliminada exitosamente.');
            }
            else {
                return response(view('errors.403'),403);
            }
        } 
        else {
            return response(view('errors.403'),403);
        }        
    }
}
