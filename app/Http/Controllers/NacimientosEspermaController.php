<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NacimientosEspermaController extends Controller
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
        $respuesta = $this->cliente->get('nacimientos_esperma');
        $cuerpo = $respuesta->getBody();
       

          /******** Traer todos los estados *******/
          $respuesta2 = $this->cliente->get('estado');
          $cuerpo2 = $respuesta2->getBody();
  
          /******** Traer todos los lugares *******/
          $respuesta3 = $this->cliente->get('lugar');
          $cuerpo3 = $respuesta3->getBody();

           /******** Traer todas las vacas recien paridas*******/
           $respuesta4 = $this->cliente->get('recien-paridas-esperma');
           $cuerpo4 = $respuesta4->getBody();
  
  
          $datos = array(
              "estados" => json_decode($cuerpo2),
              "lugares" => json_decode($cuerpo3),
              "recienp_esperma" => json_decode($cuerpo4)
          );

          return view('nacimientos_esperma.nacimientos_esperma', ['nacimientosesperma' => json_decode($cuerpo)],
        ['datos' => $datos]);
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
        $this->cliente->post('registrar-nacimiento-esperma',['json'=> $request->all()]);
        return redirect('nacimientos_esperma');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
