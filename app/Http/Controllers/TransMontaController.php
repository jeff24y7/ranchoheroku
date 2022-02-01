<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class TransMontaController extends Controller
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
        $respuesta = $this->cliente->get('trans_monta');
        $cuerpo = $respuesta->getBody();
        $respuesta2 = $this->cliente->get('vacas-sincronizadas');
        $cuerpo2 = $respuesta2->getBody();
        $datos = array(
            "vacassincro" => json_decode($cuerpo2)
        );

        return view('transmonta.trans-monta', ['transmontas'   => json_decode($cuerpo)],
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
        $this->cliente->post('agregar-monta',['json'=> $request->all()]);
        return redirect('transmonta');
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
        $respuesta = $this->cliente->get('trans_monta/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('transmonta.editar-transmonta', ['transmontas' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizar-transferencia-monta/'. $id, ['json' => $request->all()
    ]);

    return redirect('transmonta');
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
