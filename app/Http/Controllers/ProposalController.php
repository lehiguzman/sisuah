<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Period;
use App\User;
use App\Section;
use App\Research_line;
use App\Specific;
use Auth;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$proposals = Proposal::orderBy('ID', 'DESC')->paginate();
        if(Auth::user()->tipo == '1')
        {
            $proposals = Proposal::orderBy('ID', 'DESC')->paginate();
        }
        else
        {            
            $proposals = Proposal::where('user_id', '=', Auth::user()->id)->get();       
        }       
        return view('proposal.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::orderBy('ID', 'DESC')->paginate();
        $users = User::orderBy('ID', 'DESC')->paginate();
        $sections = Section::orderBy('ID', 'DESC')->paginate();
        $researchs = Research_line::orderBy('ID', 'DESC')->paginate();        
        $proposal = Proposal::where('user_id', '=', Auth::user()->id)->first();
            if ($proposal === null) 
            {
                return view('proposal.create', compact('periods', 'users', 'sections', 'researchs'));        
            }
            else
            {
               return redirect()->route('proposals.edit', $proposal->id)->with('message', 'Propuesta creada exitosamente');
            }
        
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

               $proposal = Proposal::create([
                    'period_id' => $data['period_id'],
                    'user_id' => $data['user_id'],
                    'profsem_id' => $data['profsem_id'],
                    'section_id' => $data['section_id'],                    
                    'sercom' => $data['sercom'],
                    'sercom_horas' => $data['sercom_horas'],
                    'research_line_id' => $data['research_line_id'],                    
                    'titulo' => $data['titulo'],                    
                    'planteamiento' => $data['planteamiento'],                    
                    'obj_general' => $data['obj_general'],                     
                    'status' => $data['status']                  
                ]);               
             if($data['specific_id'])
             {                
                for ($i=0; $i < count($data['specific_id']); $i++) 
                {                 
                    $specific = Specific::find($data['specific_id'][$i]);

                        if($specific)
                        {
                            $specific->proposal_id = $proposal->id;
                            $specific->save();
                        }
                }
             }   
        return redirect()->route('proposals.create')->with('message', 'Propuesta creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposal::find($id);
        return view('proposal.show', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);
        $periods = Period::orderBy('ID', 'DESC')->paginate();
        $users = User::orderBy('ID', 'DESC')->paginate();
        $sections = Section::orderBy('ID', 'DESC')->paginate();
        $researchs = Research_line::orderBy('ID', 'DESC')->paginate();
        $specifics = Specific::where('user_id', Auth::user()->id)->get();
            //dd($specifics);
        return view('proposal.edit', compact('proposal', 'periods', 'users', 'sections', 'researchs', 'specifics'));  
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
        $proposal = Proposal::find($id);

        if($proposal)
        {
            $proposal->period_id = $request->period_id;
            $proposal->user_id = $request->user_id;
            $proposal->profsem_id = $request->profsem_id;
            $proposal->section_id = $request->section_id;
            $proposal->sercom = $request->sercom;
            $proposal->sercom_horas = $request->sercom_horas;
            $proposal->research_line_id = $request->research_line_id;
            $proposal->titulo = $request->titulo;
            $proposal->planteamiento = $request->planteamiento;            
            $proposal->obj_general = $request->obj_general;
            $proposal->status = $request->status;                           
            $proposal->save();               
        }

        $specifics = Specific::where('user_id', $request->user_id)->get();
            foreach ($specifics as $specific) {
                $specific->proposal_id = $proposal->id;
                $specific->save();
            }            
        return redirect()->route('proposals.index')->with('message', 'Propuesta actualizada exitosamente');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {           
        Proposal::destroy($id);
        return redirect()->route('proposals.index')->with('message', 'Propuesta eliminada exitosamente');      
    }

    /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxSelProfSem(Request $request)
    {         
        $users = User::orderBy('ID', 'DESC')->paginate();
        $sections = Section::orderBy('ID', 'DESC')->paginate();      
       return view('proposal.ajax.divProfSem', compact('users', 'sections')); 
    }

    /**
     * update the specified code with request ajax.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */    
    public function ajaxContenido(Request $request)
    {   
         $data = $request;
         $user_id = Auth::user()->id;
         Specific::create([
                    'contenido' => $data['contenido'],
                    'proposal_id' => $data['proposal_id'],
                    'user_id' => $user_id,
                ]); 
        $specifics = Specific::where('user_id', $user_id)->get(); 
        
        return view('proposal.ajax.divSelContenidos', compact('specifics')); 
    }
}
