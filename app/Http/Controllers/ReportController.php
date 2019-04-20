<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Proposal;
use App\Period;
use App\Evaluator;
use App\Evaluation;
use App\Specific;
use App\Subject;
use App\Research_line;
use App\Section;
use DB;
use PDF;
use Auth;


class ReportController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuarios()
    {  
    	$users = DB::table('users')->select('tipo')->distinct()->orderBy('tipo')->get();    	
        return view('report.usuarios', compact('users', 'periodos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuariosPdf(Request $request)
    {  
    	$data = $request;
    	if($data['user_tipo'] == 'T')
    	{
    		$users = User::orderBy('ID', 'DESC')->paginate();
    	}
    	else
    	{
    		$users = User::where('tipo', $data['user_tipo'])->get();	
    	}

    	$datos = ['users' => $users];
        $pdf = PDF::loadView('report.usuariosPdf', $datos);
        return $pdf->stream('usuarios.pdf');          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proposals()
    {  
        $user_tipo = Auth::user()->tipo;
        $user_id = Auth::user()->id;

        if($user_tipo == 1)
        {
            $proposals = Proposal::orderBy('ID', 'DESC')->paginate();            
        }
        elseif($user_tipo == 2 or $user_tipo == 3)
        {
            $evaluators = Evaluator::where('asesor_academico', $user_id)
                                   ->orWhere('evaluator_1', $user_id)
                                   ->orWhere('evaluator_2', $user_id)
                                   ->orWhere('evaluator_3', $user_id)
                                   ->orWhere('evaluator_4', $user_id)->get();

            foreach ($evaluators as $evaluator) 
            {
                $proposals = Proposal::where('user_id', $evaluator->user_id)->get();
            }
        }
        else
        {
            $proposals = Proposal::where('user_id', $user_id)->get();
        }
            
        $users = User::orderBy('ID', 'DESC')->paginate();
        return view('report.proposals', compact('users', 'proposals'));
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proposalsPdf(Request $request)
    {  
        $data = $request;
        
        $proposal = Proposal::where('user_id', $data['user_id'])->first();
        $user = User::find($data['user_id']);
        $asignatura = Subject::find($user->subject_id);
        $users = User::orderBy('ID', 'DESC')->paginate();
        $period = Period::find($proposal->period_id);
        $specifics = Specific::where('proposal_id', $proposal->id)->get();
        $evaluations = Evaluation::where('proposal_id', $proposal->id)->get();
        $profsem = User::find($proposal->profsem_id);
        $section = Section::find($proposal->section_id);
        $investigacion = Research_line::find($proposal->research_line_id);

        $evaluator = Evaluator::where('user_id', $data['user_id'])->first();
        $asesor_academico = User::find($evaluator->asesor_academico);

        $datos = ['user' => $user,
                  'users' => $users,
                  'proposal' => $proposal,
                  'period'  => $period,
                  'specifics' => $specifics,
                  'evaluations' => $evaluations,
                  'profsem' => $profsem,
                  'section' => $section,
                  'investigacion' => $investigacion,
                  'asesor_academico' => $asesor_academico,
                  'asignatura' => $asignatura];

        $pdf = PDF::loadView('report.proposalsPdf', $datos);
        return $pdf->stream('propuesta.pdf');          
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assigns()
    {  
        $periods = Period::orderBy('ID', 'DESC')->paginate();
        return view('report.assigns', compact('periods'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignsPdf(Request $request)
    {  
        $data = $request;
        $user_id = Auth::user()->id;
        $proposals = Proposal::where('period_id', $data['period_id'])->get();
        $users = User::orderBy('ID', 'DESC')->paginate();
        foreach ($proposals as $proposal) {
             $evaluators = Evaluator::where('user_id', $proposal->user_id)->where('asesor_academico', $user_id)
                                   ->orWhere('evaluator_1', $user_id)
                                   ->orWhere('evaluator_2', $user_id)
                                   ->orWhere('evaluator_3', $user_id)
                                   ->orWhere('evaluator_4', $user_id)->get();
        }    

        foreach ($evaluators as $evaluator) {
             $proposals = Proposal::where('user_id', $evaluator->user_id)->get();
        }  

        foreach ($proposals as $proposal) {
            $evaluations = Evaluation::where('proposal_id', $proposal->id)->where('prof_id', $user_id)->get();
        }

        
        $datos = ['proposals' => $proposals,
                  'users' => $users,
                  'evaluations' => $evaluations];

        $pdf = PDF::loadView('report.assignsPdf', $datos);
        return $pdf->stream('asignaciones.pdf');          
    }

}
