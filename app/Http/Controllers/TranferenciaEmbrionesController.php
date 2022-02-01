<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TranferenciaEmbrionesController extends Controller
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
        $respuesta = $this->cliente->get('transferencias-de-embriones');
        $cuerpo = $respuesta->getBody();

        $respuesta2 = $this->cliente->get('detalles_embrion');
        $cuerpo2 = $respuesta2->getBody();

        $respuesta3 = $this->cliente->get('vacas-sincronizadas');
        $cuerpo3 = $respuesta3->getBody();

        $datos = array(
            "detalles" => json_decode($cuerpo2),
            "vacassincro" => json_decode($cuerpo3)
        );
        return view('transembriones.transferencia-e', ['transembriones'   => json_decode($cuerpo)],
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
        $this->cliente->post('registrar-transferencia-embrion',['json'=> $request->all()]);
        return redirect('transembriones');
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
        $respuesta = $this->cliente->get('transferencias-de-embriones/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('transembriones.editar-transe', ['transembriones' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizar-transferencia-embrion/'. $id, ['json' => $request->all()
    ]);

    return redirect('transembriones');
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
