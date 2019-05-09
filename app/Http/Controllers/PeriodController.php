<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::orderBy('ID', 'DESC')->paginate();
        return view('period.index', compact('periods'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('period.create');
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
            
                Period::create([
                    'denominacion' => $data['denominacion'],
                    'anio' => $data['anio'],
                    'descripcion' => $data['descripcion']                    
                ]);
        return redirect()->route('periods.index')->with('message', 'Periodo Académico agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $period = Period::find($id);
        return view('period.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $period = Period::find($id);
        return view('period.edit', compact('period'));  
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
        $period = Period::find($id);

        if ($request->descripcion == "") 
            {
                $request->descripcion = '';
            }
        if($period)
        {
            $period->denominacion = $request->denominacion;
            $period->anio = $request->anio;
            $period->descripcion = $request->descripcion;               
            $period->save();         
        }
        return redirect()->route('periods.index')->with('message', 'Periodo Académico editado exitosamente');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Period::destroy($id);
        return redirect()->route('periods.index')->with('message', 'Periodo Académico eliminado exitosamente');  
    }
}
