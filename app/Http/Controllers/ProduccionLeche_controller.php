<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProduccionLeche_controller extends Controller
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
        $respuesta = $this->cliente->get('produccion');
        $cuerpo = $respuesta->getBody();

           /******** Traer los codigos de ganado *******/
           $respuesta2 = $this->cliente->get('vacas_ordenio');
           $cuerpo2 = $respuesta2->getBody();
   
           $datos = array(
             "ganados" => json_decode($cuerpo2),
             
         );
    
         return view('produccion_leche.index-leche',
           ['produccion_leche' => json_decode($cuerpo)],
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
        return view('produccion_leche.registro-leche');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  @return \Illuminate\Http\Response
     */
    // <script>
    //                         @error('COD_REGISTRO_GANADO')
    //                     $('#crearregistro').modal("show");
    //                     @enderror
    //                     </script>

    public function store(Request $request)
    {

        

      $request->validate (  rules: [
            "COD_REGISTRO_GANADO" => "required",
            "PRD_LITROS" => "required"
            
        ]);
        
        $this->cliente->post('insertarleche', [
            'json' => $request->all()
        ]);
      
        return redirect('/produccion_leche') ->with('info', 'Registro ingresado correctamente ');
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
        $respuesta = $this->cliente->get( $id);
        $cuerpo = $respuesta->getBody();
        return view('produccion_leche.editar', ['produccion_leche' => json_decode($cuerpo)]);
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
        $this->cliente->put('actualizar-produccion-leche/' . $id, [
            'json' => $request->all()
        ]);

        return redirect('/produccion_leche')
        ->with('warning', 'Registro editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $this->cliente->delete('EliminarRegistro/'. $id);
    
        return redirect('/produccion_leche')
       ->with('message', 'El Registro se elimino correctamente');
    }







}
