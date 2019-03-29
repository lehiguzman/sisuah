<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluator;
use App\user;

class EvaluatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('ID', 'DESC')->paginate();
        $evaluators = Evaluator::orderBy('ID', 'DESC')->paginate();
        return view('evaluator.index', compact('evaluators', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('ID', 'DESC')->paginate();
        return view('evaluator.create', compact('users'));
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
                Evaluator::create([
                    'user_id' => $data['user_id'],
                    'asesor_academico' => $data['asesor_academico'],
                    'evaluator_1' => $data['evaluator_1'],
                    'evaluator_2' => $data['evaluator_2'],
                    'evaluator_3' => $data['evaluator_3'],
                    'evaluator_4' => $data['evaluator_4'],
                    'observacion' => $data['observacion'],                    
                ]);
        return redirect()->route('evaluators.index')->with('message', 'Registro de Evaluadores agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluator = Evaluator::find($id);
        $users = User::orderBy('ID', 'DESC')->paginate();
        return view('evaluator.show', compact('evaluator', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluator = Evaluator::find($id);
        $users = User::orderBy('ID', 'DESC')->paginate();
        return view('evaluator.edit', compact('evaluator', 'users'));  
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
        $evaluator = Evaluator::find($id);
        if($evaluator)
        {
            $evaluator->user_id = $request->user_id;
            $evaluator->asesor_academico = $request->asesor_academico;
            $evaluator->evaluator_1 = $request->evaluator_1;
            $evaluator->evaluator_2 = $request->evaluator_2;
            $evaluator->evaluator_3 = $request->evaluator_3;
            $evaluator->evaluator_4 = $request->evaluator_4;
            $evaluator->observacion = $request->observacion;                            
            $evaluator->save();         
        }
        return redirect()->route('evaluators.index')->with('message', 'Registro de Evaluadores actualizado exitosamente');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evaluator::destroy($id);
        return redirect()->route('evaluators.index')->with('message', 'Registro de Evaluadores eliminado exitosamente');
    }
}
