<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CompraMedicamentoController extends Controller
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
        /******** Traer los registros de compra medicamento *****/
        $respuesta = $this->cliente->get('todos-compra-medicamentos');
        $cuerpo = $respuesta->getBody();

        /******** Traer todos los medicamentos *******/
        $respuesta2 = $this->cliente->get('todos-medicamentos');
        $cuerpo2 = $respuesta2->getBody();

        $respuesta3 = $this->cliente->get('proveedores');
        $cuerpo3 = $respuesta3->getBody();



        $datos = array(
            "medicamentos" => json_decode($cuerpo2),
            "proveedores" => json_decode($cuerpo3)
        );

        return view(
            'compra_medicamento.ComprarMedicamento',
            ['ComprarMedicamentos' => json_decode($cuerpo)],
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
        return view('compra_medicamento.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cliente->post('agregar-compra-medicamento', [
            'json' => $request->all()
        ]);

        return redirect('/compra_medicamento');
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
