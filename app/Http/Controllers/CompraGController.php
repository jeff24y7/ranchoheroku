<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CompraGController extends Controller
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
        $respuesta = $this->cliente->get('compras');
        $cuerpo = $respuesta->getBody();
        
        $respuesta3 = $this->cliente->get('proveedores');
        $cuerpo3 = $respuesta3->getBody();

        /******** Traer todos los estados *******/
        $respuesta4 = $this->cliente->get('estado');
        $cuerpo4 = $respuesta4->getBody();

        /******** Traer todos los lugares *******/
        $respuesta5 = $this->cliente->get('lugar');
        $cuerpo5 = $respuesta5->getBody();

        $respuesta6 = $this->cliente->get('roles');
        $cuerpo6 = $respuesta6->getBody();


        $datos = array(
            "proveedores" => json_decode($cuerpo3),
            "estados" => json_decode($cuerpo4),
            "lugares" => json_decode($cuerpo5),
            "roles" => json_decode($cuerpo6)
        );

        return view('compras.index', ['compras' => json_decode($cuerpo)],
        ['datos' => $datos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compras.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cliente->post('insertarcompraganado', [
            'json' => $request->all()
        ]);

        return redirect('/compras');


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
        $this->cliente->put('actualizarpersona/'.$id, [
            'json' => $request->all()
        ]);

        return redirect('/compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cliente->delete($id);

        return redirect('/compras');
    }
}
