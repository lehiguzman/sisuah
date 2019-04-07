<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Evaluator;
use App\Period;
use App\Proposal;
use App\Specific;
use App\User;
use Auth;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $evaluations = Evaluation::where('prof_id', '=', $user_id)->get();
        $users = User::orderBy('ID', 'DESC')->paginate();
        return view('evaluation.index', compact('evaluations', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::orderBy('ID', 'DESC')->paginate();
        return view('evaluation.create', compact('periods'));
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

        $evaluation = Evaluation::updateOrCreate(
            ['proposal_id' => $data['proposal_id'], 'prof_id' => $data['prof_id']],
            ['period_id' =>  $data['period_id'], 
             'user_id' => $data['user_id'], 
             'resultado' => $data['resultado'], 
             'observacion' => $data['observacion']]);
      
        return redirect()->route('evaluations.index')->with('message', 'Evaluación agregada exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation = Evaluation::find($id);
        $periods = Period::orderBy('ID', 'DESC')->paginate();     
        $users = User::orderBy('ID', 'DESC')->paginate();
        $proposal = Proposal::find($evaluation->proposal_id);
        $specifics = Specific::where('proposal_id', $proposal->id)->get();        
        return view('evaluation.edit', compact('evaluation', 'periods', 'users', 'proposal', 'specifics'));  
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
         $evaluation = Evaluation::find($id);
        if($evaluation)
        {            
            $evaluation->resultado = $request->resultado;
            $evaluation->observacion = $request->observacion;            
            $evaluation->save();         
        }
        return redirect()->route('evaluations.index')->with('message', 'Registro de evaluación actualizado exitosamente');
    }

    /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxStudents(Request $request)
    {         
        $data = $request;
        $user_id = Auth::user()->id;

        $proposals = Proposal::where('period_id', $data['period_id'])->get();          
        $users = User::orderBy('ID', 'DESC')->paginate();  
        $evaluators = Evaluator::where('evaluator_1', '=', $user_id)
                            ->orWhere('evaluator_2', '=', $user_id)
                            ->orWhere('evaluator_3', '=', $user_id)
                            ->orWhere('evaluator_4', '=', $user_id)->get();
        
        return view('evaluation.ajax.divStudents', compact('users', 'proposals', 'evaluators')); 
    }

        /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxProposal(Request $request)
    {         
        $data = $request;                
        $user_id = Auth::user()->id;

        $proposal = Proposal::find($data['id']);  
        $specifics = Specific::where('proposal_id', $proposal->id)->get();  

        return view('evaluation.ajax.divProposal', compact('proposal', 'specifics'));         
    }
}
