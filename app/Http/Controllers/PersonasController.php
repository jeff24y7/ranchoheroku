<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PersonasController extends Controller
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
        $respuesta = $this->cliente->get('VistaPersona');
        $cuerpo = $respuesta->getBody();

        $respuesta2 = $this->cliente->get('roles');
        $cuerpo2 = $respuesta2->getBody();

        return view('personas.usuarios-registrados', ['personas' => json_decode($cuerpo)],
        ['roles' => json_decode($cuerpo2)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cliente->post('insertarpersona',['json'=> $request->all()]);
        return redirect('personas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $COD_PERSONA
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
        $respuesta = $this->cliente->get('mostrar_persona/'.$id);
        $cuerpo = $respuesta->getBody();
        return view('personas.editar-persona', ['personas' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizarpersona/'. $id, ['json' => $request->all()
        ]);

        return redirect('personas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cliente->delete('deletepersona/'. $id);
        return redirect('personas');
    }
}
