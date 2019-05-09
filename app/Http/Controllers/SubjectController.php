<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('ID', 'DESC')->paginate();
        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;
        if ($data['descripcion'] == "") {
                $data['descripcion'] = '';
            }
        if ($data['observacion'] == "") {
                $data['observacion'] = '';
            }
                Subject::create([
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                    'observacion' => $data['observacion'],                    
                ]);
        return redirect()->route('subjects.index')->with('message', 'Materia agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subject.edit', compact('subject'));  
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
        $subject = Subject::find($id);
        if ($request->descripcion == "") 
            {
                $request->descripcion = '';
            }
        if ($request->observacion == "") 
            {
                $request->observacion = '';
            }
        if($subject)
        {
            $subject->nombre = $request->nombre;
            $subject->descripcion = $request->descripcion;
            $subject->observacion = $request->observacion;                            
            $subject->save();         
        }
        return redirect()->route('subjects.index')->with('message', 'Materia actualizada exitosamente');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::destroy($id);
        return redirect()->route('subjects.index')->with('message', 'Materia eliminada exitosamente');      
    }
}
