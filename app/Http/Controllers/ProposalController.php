<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Period;
use App\User;
use App\Section;
use App\Research_line;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::orderBy('ID', 'DESC')->paginate();
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

        return view('proposal.create', compact('periods', 'users', 'sections', 'researchs'));
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
                Proposal::create([
                    'titulo' => $data['titulo'],                    
                    'planteamiento' => $data['planteamiento'],                    
                    'obj_general' => $data['obj_general'],                     
                    'status' => $data['status'],                    
                ]);
        return redirect()->route('proposals.index')->with('message', 'Propuesta creada exitosamente');
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
        return view('proposal.edit', compact('proposal'));  
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
            $proposal->titulo = $request->titulo;
            $proposal->planteamiento = $request->planteamiento;            
            $proposal->obj_general = $request->obj_general;
            $proposal->status = $request->status;                           
            $proposal->save();         
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
}
