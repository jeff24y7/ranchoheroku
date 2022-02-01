<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GanadoGeneralController extends Controller
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
        $respuesta = $this->cliente->get('ganado_general');
        $cuerpo = $respuesta->getBody();

        /******** Traer todos los estados *******/
        $respuesta2 = $this->cliente->get('estado');
        $cuerpo2 = $respuesta2->getBody();

        /******** Traer todos los lugares *******/
        $respuesta3 = $this->cliente->get('lugar');
        $cuerpo3 = $respuesta3->getBody();


        $datos = array(
            "estados" => json_decode($cuerpo2),
            "lugares" => json_decode($cuerpo3)
        );

       
        return view('ganado.ganado-general', ['ganados' => json_decode($cuerpo)],
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
        $this->cliente->post('insertarganado',['json'=> $request->all()]);
        return redirect('ganado');
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
        $respuesta = $this->cliente->get('ganado_general/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('ganado.editar-ganado', ['ganados' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizarganado/'. $id, ['json' => $request->all()
        ]);

        return redirect('ganado');
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
