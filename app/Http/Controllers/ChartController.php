<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Proposal;
use Lava;

class ChartController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proposalXStatus()
    {      

        $status = Lava::DataTable();

        $proceso = 'P';
        $aprobado = 'A';
        $noAprobado = 'N';
        $modificable = 'M';

        $proposalsPro = Proposal::where('status', $proceso)->count();
        $proposalsApr = Proposal::where('status', $aprobado)->count();
        $proposalsNoA = Proposal::where('status', $noAprobado)->count();
        $proposalsMod = Proposal::where('status', $modificable)->count();

        $status->addStringColumn('Estaus de Propuesta')
        ->addNumberColumn('Porcentaje')
        ->addRow(['Proceso', $proposalsPro])
        ->addRow(['Aprobadas', $proposalsApr])
        ->addRow(['No aprobadas', $proposalsNoA])
        ->addRow(['Modificables', $proposalsMod]);

		$lava = Lava::DonutChart('Status', $status, [
    		'title' => 'Porcentaje por Estatus de Propuestas de Trabajo de Grado',
    		'titleTextStyle' => [
        		'color'    => '#eb6b2c',
        		'fontSize' => 18 ]
		]);        

        return view('chart.proposalsXEstatus', compact('lava'));
    }
}
