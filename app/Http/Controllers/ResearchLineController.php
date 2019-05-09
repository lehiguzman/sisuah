<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research_line;

class ResearchLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research_lines = Research_line::orderBy('ID', 'DESC')->paginate();
        return view('research_line.index', compact('research_lines')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research_line.create');
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
            if ($data['observacion'] == "") {
                $data['observacion'] = '';
            }
                Research_line::create([
                    'nombre' => $data['nombre'],
                    'observacion' => $data['observacion']                    
                ]);
        return redirect()->route('research_lines.index')->with('message', 'Linea de Investigación agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $research_line = Research_line::find($id);
        return view('research_line.show', compact('research_line'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $research_line = Research_line::find($id);
        return view('research_line.edit', compact('research_line'));  
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
        $research_line = Research_line::find($id);
         if ($request->observacion == "") 
            {
                $request->observacion = '';
            }
        if($research_line)
        {
            $research_line->nombre = $request->nombre;
            $research_line->observacion = $request->observacion;                           
            $research_line->save();         
        }
        return redirect()->route('research_lines.index')->with('message', 'Linea de Investigación editada exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Research_line::destroy($id);
        return redirect()->route('research_lines.index')->with('message', 'Linea de Investigación eliminada exitosamente');  
    }
}
