<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;


class VentasController extends Controller

{
    private $cliente;

    public function __construct () {
        $this->cliente = new Client(['base_uri' => 'https://apisrachov1.herokuapp.com/']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $respuesta = $this->cliente->get('detalle_de_ventas');
            $cuerpo = $respuesta->getBody();

          /******** Traer los codigos de ganado *******/
          $respuesta2 = $this->cliente->get('ganado_ventas');
          $cuerpo2 = $respuesta2->getBody();

        /******** Traer los codigos de cliente *******/
          $respuesta3 = $this->cliente->get('clientes');
          $cuerpo3 = $respuesta3->getBody();

          $datos = array(
            "ganados" => json_decode($cuerpo2),
            "clientes" => json_decode($cuerpo3),
        );
  
          
          return view('ventas.index-venta', 
          ['ventas' => json_decode($cuerpo)],
          ['datos' => $datos]
         );
    }

    


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('ventas.nueva-venta');
         
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cliente->post('insertardetalleventa', [
            'json' => $request->all()
        ]);

        return redirect('/ventas');
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
        $this->cliente->delete('EliminarVenta/'. $id);

        return redirect('/ventas');
    }
    
}
