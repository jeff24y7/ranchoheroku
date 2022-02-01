<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client as Client;
use Illuminate\Http\Request;
use  Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{

    private $cliente;

    public function __construct()
    {

        $this->cliente = new Client(['base_uri' => 'https://apisrachov1.herokuapp.com/']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta =  $this->cliente->get('produccion_leche');
        $cuerpo = $respuesta->getBody();
        return view('reporte.reporteindex', ['leche' => json_decode($cuerpo)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $reporte = $request->input('reporte');
        $v_inicio = $request->input('inicio');
        $v_final = $request->input('final');
        $client = new Client();
        switch ($reporte) {
            case 1:
                $respuesta = $client->request('GET', 'https://apisrachov1.herokuapp.com/produccion_leche?inicio=' . $v_inicio . '&final=' . $v_final);
                $cuerpo = $respuesta->getbody();
                $pdf = PDF::loadView('reporte.salidareporte', ['leche' => json_decode($cuerpo)]);
                return $pdf->stream('reporte.pdf');
                break;
            case 2:
                $respuesta = $client->request('GET', 'https://apisrachov1.herokuapp.com/compra_ganado?inicio=' . $v_inicio . '&final=' . $v_final);
                $cuerpo = $respuesta->getbody();
                $pdf = PDF::loadView('reporte.reporteganado', ['ganado' => json_decode($cuerpo)]);
                return $pdf->stream('reporte.pdf');
                break;
            default:
            $respuesta = $client->request('GET', 'https://apisrachov1.herokuapp.com/venta_ganado?inicio=' . $v_inicio . '&final=' . $v_final);
            $cuerpo = $respuesta->getbody();
            $pdf = PDF::loadView('reporte.reporteventa', ['venta' => json_decode($cuerpo)]);
            return $pdf->stream('reporte.pdf');
        }
        
        
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}