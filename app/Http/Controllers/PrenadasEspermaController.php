<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PrenadasEspermaController extends Controller
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
        $respuesta = $this->cliente->get('vaca_prenada_esperma');
        $cuerpo = $respuesta->getBody();

        return view('prenadas_esperma.prenadas-esperma', ['vacasprenadasesperma'   => json_decode($cuerpo)]
    );
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
        //
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
        $respuesta = $this->cliente->get('mostrar_vacaprenada-esperma/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('prenadas_esperma.editar-vacapesperma', ['vacasprenadasesperma' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizar-vacap-esperma/'. $id, ['json' => $request->all()
    ]);

    return redirect('prenadas_esperma');
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
