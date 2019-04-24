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
use App\Mail\NotaMail;
use Mail;

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

        $this->actualizarStatus($data);

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
        $data = $request;
        $evaluation = Evaluation::find($id);
        
        if($evaluation)
        {            
            $evaluation->resultado = $request->resultado;
            $evaluation->observacion = $request->observacion;            
            $evaluation->save();         
        }

        $this->actualizarStatus($data);

        return redirect()->route('evaluations.index')->with('message', 'Registro de evaluación actualizado exitosamente');
    }

    public function actualizarStatus($data)
    {
        $evaluadores = Evaluator::where('user_id', $data['user_id'])->get();

            foreach ($evaluadores as $evaluador) {
                $resultado_1 = Evaluation::where('prof_id', $evaluador->evaluator_1)->where('proposal_id', $data['proposal_id'])->first();
                if($resultado_1 == null) { $res_1 = 'NULL'; } else { $res_1=$resultado_1->resultado; }
                $resultado_2 = Evaluation::where('prof_id', $evaluador->evaluator_2)->where('proposal_id', $data['proposal_id'])->first();
                if($resultado_2 == null) { $res_2 = 'NULL'; } else { $res_2=$resultado_2->resultado; }
                $resultado_3 = Evaluation::where('prof_id', $evaluador->evaluator_3)->where('proposal_id', $data['proposal_id'])->first();
                if($resultado_3 == null) { $res_3 = 'NULL'; } else { $res_3=$resultado_3->resultado; }
                $resultado_4 = Evaluation::where('prof_id', $evaluador->evaluator_4)->where('proposal_id', $data['proposal_id'])->first();
                if($resultado_4 == null) { $res_4 = 'NULL'; } else { $res_4=$resultado_4->resultado; }
                
            }            

            $proposal = Proposal::find($data['proposal_id']);

            if($res_1 == 1 && $res_2 == 1 && $res_3 == 1 && $res_4 == 1){                
                $proposal->status = 'A';
                $receivers = User::find($data['user_id']);
                Mail::to($receivers->email)->send(new NotaMail($receivers));
            }
            elseif($res_1 == 3 && $res_2 == 3 && $res_3 == 3 && $res_4 == 3)
            {                
                $proposal->status = 'N';
            }
            elseif($res_1 == 2 || $res_2 == 2 || $res_3 == 2 || $res_4 == 2)
            {
                $proposal->status = 'M';
            }
            else
            {
                $proposal->status = 'P';
            }                
                $proposal->save();
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
