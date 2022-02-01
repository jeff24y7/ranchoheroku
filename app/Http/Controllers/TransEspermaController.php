<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TransEspermaController extends Controller
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
        $respuesta = $this->cliente->get('transferencias-de-esperma');
        $cuerpo = $respuesta->getBody();

        $respuesta2 = $this->cliente->get('detalles-esperma');
        $cuerpo2 = $respuesta2->getBody();

        $respuesta3 = $this->cliente->get('vacas-sincronizadas');
        $cuerpo3 = $respuesta3->getBody();

        $datos = array(
            "detalles" => json_decode($cuerpo2),
            "vacassincro" => json_decode($cuerpo3)
        );
        return view('transesperma.trans-esperma', ['transespermas'   => json_decode($cuerpo)],
        ['datos' => $datos]);
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
        $this->cliente->post('registrar-transferencia-esperma',['json'=> $request->all()]);
        return redirect('transesperma');
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
        $respuesta = $this->cliente->get('transferencias-de-esperma/'.$id);
        $cuerpo = $respuesta->getBody();
        
        return view('transesperma.editar-transesperma', ['transespermas' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizar-transferencia-esperma/'. $id, ['json' => $request->all()
    ]);

    return redirect('transesperma');
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
