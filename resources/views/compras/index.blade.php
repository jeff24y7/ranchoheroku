@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<x-app-layout>
    <x-slot name="header">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Compra de Ganado</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                            <li class="breadcrumb-item active">Compra ganado</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!--------------------------------- Formulario con datos iniciales de compra --------------------------------------------------->



        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">

                                <button class="btn btn-primary" data-toggle="modal" data-target="#CompraGanado"><i class="fas fa-plus-circle"></i> Agregar compra de ganado</button>



                                <button class="btn btn-1 btn-primary" data-toggle="modal" data-target="#NuevaPersona"><i class="fas fa-plus-circle"></i> Agregar Proveedor </button>

                            </div>
                        </div>
                        <div class="card-body">

                            <table id="TB" class="table table-bordered table-hover US">
                                <thead>
                                    <tr>
                                        <th>Código de Compra</th>
                                        <th>Número de Arete</th>
                                        <th>Nombre Ganado</th>
                                        <th>Precio</th>
                                        <th>Estado Ganado</th>
                                        <th>Lugar</th>
                                        <th>Fecha de Compra</th>
                                        <th>Proveedor</th>
                                        <th>Eliminar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($compras as $compras)
                                    <tr>
                                        <td>{{ $compras->COD_COMPRA_GANADO }}</td>
                                        <td>{{ $compras->NUM_ARETE}}</td>
                                        <td>{{ $compras->NOM_GANADO }}</td>
                                        <td>{{ $compras->PRE_GANADO }}</td>
                                        <td>{{ $compras->DET_ESTADO }}</td>
                                        <td>{{ $compras->DIR_LUGAR }}</td>
                                        <td>{{\Carbon\Carbon::parse( $compras->FEC_COMPRA)->format('d/m/Y') }}</td>
                                        <td>{{ $compras->PROVEEDOR }}</td>
                                        <td>
                                            <form method="post" action="{{url('compras', $compras->COD_COMPRA_GANADO)}}">
                                                @csrf()
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Eliminar" />
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>




                        </div>



                    </div>
                </div>
            </div>
        </div>






        <!---------------------------------------------- Formulario crear producto ------------------------------------>

        <div class="modal fade" rol="dialog" id="CompraGanado">

            <div class="modal-dialog modal-xl" class="col-12">

                <div class="modal-content">

                    <form method="post" role="form">
                        @csrf()
                        <div class="modal-body">

                            <div class="box-body">

                                <h5>Agregar compra de ganado </h5><br />
                                <h9>Campos oligatorios <span style="color: red;"> * </span></h9><br />
                                <h12> </h12><br />
                                <div class="modal-body row col-md-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Fecha de compra</label>
                                            <input class="form-control" placeholder="FECHA" name="FECHA" type="date" value="{{date('Y-m-d')}}" requerid>
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Proveedor:</label>

                                            <select name="PERSONA" class="form-control">
                                                <option value="" selected disabled>Seleccione un proveedor</option>
                                                @foreach ($datos["proveedores"] as $proveedor)
                                                <option value="{{$proveedor->COD_PERSONA}}">{{$proveedor->PERSONA}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Arete</label>
                                            <input class="form-control" name="ARETE" placeholder="ARETE" type="number" min="1" required />
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Nombre de ganado</label>
                                            <input name="NOMBRE" placeholder="NOMBRE" class="form-control" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>color</label>
                                            <input name="COLOR" placeholder="COLOR" class="form-control" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Estado:</label>
                                            <select name="ESTADO" class="form-control">
                                                <option value="" selected disabled>Seleccione un Estado</option>
                                                @foreach ($datos["estados"] as $estado)
                                                <option value="{{$estado->COD_ESTADO}}">{{$estado->DET_ESTADO}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Lugar:</label>
                                            <select name="LUGAR" class="form-control">
                                                <option value="" selected disabled>Seleccione un Lugar</option>
                                                @foreach ($datos["lugares"] as $lugar)
                                                <option value="{{$lugar->COD_LUGAR}}">{{$lugar->DIR_LUGAR}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Peso</label>
                                            <input class="form-control" name="PESO" type="number" placeholder="KG." />
                                        </div>
                                        <div class="form-group">
                                            <label>Fierro</label>
                                            <input class="form-control" name="FIERRO" placeholder="FIERRO" />
                                        </div>
                                        <div class="form-group">
                                            <label>Raza</label>
                                            <input class="form-control" name="RAZA" placeholder="RAZA" />
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Sexo</label>
                                            <select class="custom-select" name="SEXO" requerid>
                                                <option>MACHO</option>
                                                <option>HEMBRA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Precio</label>
                                            <input class="form-control" name="PRECIO" placeholder="PRECIO" type="number" min="1" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6" style="color: #f5f;">
                                        <button type="submit" class="btn btn-primary btn-block" data-target="#CompraGanado"><i class="fas fa-plus-circle"></i> Agregar</button>
                                    </div>

                                    <div class="col-6">

                                        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>

                </div>

            </div>

        </div>

        <div class="modal fade" id="NuevaPersona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" class="col-12">
                <div class="modal-content">
                    <form method="post" role="form">
                        @csrf()
                        <div class="modal-header">
                            <h3>Nueva Registro de Persona.</h3>
                        </div>
                        <div class="modal-body row col-md-12">
                            <div class="col-sm-6">
                                <h5 class="card-title">DATOS PERSONALES</h5>
                                <p class="card-text">
                                <p><span style="color: red;"> * Campos obrigatorios </span></p>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span>Primer Nombre</label>
                                    <input type="text" name="PRI_NOMBRE" class="form-control" id="PRI_NOMBRE">
                                </div>

                                <div class="form-group">
                                    <label>Segundo Nombre</label>
                                    <input type="text" name="SEG_NOMBRE" class="form-control" id="SEG_NOMBRE">
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span> Primer Apellido</label>
                                    <input type="text" name="PRI_APELLIDO" class="form-control" id="PRI_APELLIDO">
                                </div>

                                <div class="form-group">
                                    <label>Segundo Apellido</label>
                                    <input type="text" name="SEG_APELLIDO" class="form-control" id="SEG_APELLIDO">
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span> DNI Persona</label>
                                    <input type="text" name="ID_PERSONA" class="form-control" id="ID_PERSONA">
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span> Sexo</label>
                                    <select name="SEX_PERSONA" id="SEX_PERSONA" class="custom-select">
                                        <option>MASCULINO</option>
                                        <option>FEMENINO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Estado Civil</label>
                                    <select name="IND_PERSONA" id="IND_PERSONA" class="custom-select">
                                        <option>SOLTERO</option>
                                        <option>CASADO</option>
                                        <option>VIUDO</option>
                                        <option>DIVORCIADO</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <br></br>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span> Fecha de Nacimiento</label>
                                    <input name="FEC_NACIMIENTO" placeholder="" id="FEC_NACIMIENTO" class="form-control" id="fecha" type='date' min="1900-01-01" max="">
                                </div>

                                <div class="form-group">
                                    <label><span style="color: red;"> *</span> Detalle de la Dirección</label>
                                    <textarea name="DET_DIRECCION" id="DET_DIRECCION" rows="3" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label><span style="color: red;"> *</span> Dirección de correo electrónico</label>
                                    <input type="text" name="DIR_CORREO" class="form-control" id="DIR_CORREO">
                                </div>

                                <div class="form-group">
                                    <label><span style="color: red;"> *</span>Rol</label>
                                    <select name="COD_ROL" class="form-control">
                                        <option value="" selected disabled>Seleccione un rol</option>
                                        @foreach ($datos["roles"] as $rol)
                                        <option value="{{$rol->COD_ROL}}">{{$rol->NOM_ROL}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><span style="color: red;"> *</span>Número de Área</label>
                                    <input type="text" name="NUM_AREA" class="form-control" id="NUM_AREA">
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span>Número de fijo</label>
                                    <input type="text" name="NUM_TELEFONO" class="form-control" id="NUM_TELEFONO">
                                </div>
                                <div class="form-group">
                                    <label>Número de teléfono celular</label>
                                    <input type="text" name="NUM_CELULAR" class="form-control" id="NUM_CELULAR">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" background="color#f5f;">
                            <div class="row">
                                <div class="col-6" style="color: #f5f;">
                                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#Cancelar">Cancelar</button>
                                </div>

                                <div class="col-6">

                                    <button type="submit" class="btn  btn-primary btn-block" data-toggle="modal" data-target="#RegistrarPersona">Registrar Persona <i class="fas   mr-2" data-toggle="modal"></i></button>
                                </div>
                            </div>
                        </div>
                     </div>
                </form>

            </div>
        </div>








    </x-slot>


</x-app-layout>


<strong>Copyright &copy; 2014-2020 <a href="#">Rancho</a>.</strong> All rights reserved.


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#TB').DataTable({
        responsive: true,
        autoWidth: false,

        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - lo sentimos",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros en esta tabla",
            "infoFiltered": "(filtrado de _MAX_ registros totales)"
        }
    });
</script>

@stop