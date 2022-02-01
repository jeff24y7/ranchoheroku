<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class EmbrionController extends Controller
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
        $respuesta = $this->cliente->get('embrion');
        $cuerpo = $respuesta->getBody();

        $respuesta3 = $this->cliente->get('proveedores');
        $cuerpo3 = $respuesta3->getBody();

        $datos = array(
            "proveedores" => json_decode($cuerpo3)
        );
        return view('embrion.index', ['embrion' => json_decode($cuerpo)],
        ['datos' => $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('embrion.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cliente->post('insertarcompraembrion', [
            'json' => $request->all()
        ]);

        return redirect('/embrion');
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
        $this->cliente->delete('deleteembrion/'.$id);
        return redirect('/embrion');
    }
}
