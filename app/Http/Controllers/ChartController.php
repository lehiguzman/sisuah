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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proposalXMes()
    {      

        $mensual = Lava::DataTable();

        $enero = 0; $febrero = 0; $marzo = 0;
        $abril = 0; $mayo = 0; $junio = 0;
        $julio = 0; $agosto = 0; $septiembre = 0;
        $octubre = 0; $noviembre = 0; $diciembre = 0;

        $proposals = Proposal::orderBy('ID', 'DESC')->paginate();

        foreach ($proposals as $proposal) {
            $mes = date('m', strtotime($proposal->created_at));
            if($mes == '01') { $enero++; } 
            if($mes == '02') { $febrero++; } 
            if($mes == '03') { $marzo++; } 
            if($mes == '04') { $abril++; } 
            if($mes == '05') { $mayo++; } 
            if($mes == '06') { $junio++; } 
            if($mes == '07') { $julio++; } 
            if($mes == '08') { $agosto++; } 
            if($mes == '09') { $septiembre++; } 
            if($mes == '10') { $octubre++; } 
            if($mes == '11') { $noviembre++; } 
            if($mes == '12') { $diciembre++; } 
        }
        
        $cantidad = Lava::DataTable();

        $cantidad->addStringColumn('Mes')
           ->addNumberColumn('Cantidad de Propuestas')
           ->addRow(['Enero', $enero])
           ->addRow(['Febrero', $febrero])
           ->addRow(['Marzo', $marzo])
           ->addRow(['Abril', $abril])
           ->addRow(['Mayo', $mayo])
           ->addRow(['Junio', $junio])
           ->addRow(['Julio', $julio])
           ->addRow(['Agosto', $agosto])
           ->addRow(['Septiembre', $septiembre])
           ->addRow(['Octubre', $octubre])
           ->addRow(['Noviembre', $noviembre])
           ->addRow(['Diciembre', $diciembre]);

           $lava = Lava::AreaChart('Cantidad', $cantidad, [
            'title' => 'Propuestas de Tesis de Grado por mes',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 18 ],
            'legend' => [
            'position' => 'out'
            ]
            ]);              

        return view('chart.proposalXMes', compact('lava'));
    }

    
}
