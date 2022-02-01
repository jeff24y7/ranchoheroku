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
                        <h1>Usuarios Registrados</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                            <li class="breadcrumb-item active">Personas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="box-header">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevaPersona"></i> Registrar Persona</button>

                            </div>
                        </div>

                        <div class="card-body">


                            <table id="TB" class="table table-bordered table-hover US">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código Persona</th>
                                        <th class="">Primer Nombre</th>
                                        <th class="">Primer Apellido</th>
                                        <th class="">Sexo</th>
                                        <th class="">Estado Civil</th>
                                        <th class="">Dirección</th>
                                        <th class="" style="width: 10%">Correo Electrónico</th>
                                        <th class="">Relación Comercial</th>
                                        <th class="">Número de Área</th>
                                        <th class="">Número de Área</th>
                                        <th class="">Estado Comercial</th>
                                        <th class="" style="width: 10%">Editar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($personas as $persona)
                                    <tr>
                                        <td class="text-center">{{ $persona->COD_PERSONA }}</td>
                                        <td>{{ $persona->PRI_NOMBRE }}</td>
                                        <td>{{ $persona->PRI_APELLIDO }}</td>
                                        <td>{{ $persona->SEX_PERSONA }}</td>
                                        <td>{{ $persona->IND_PERSONA }}</td>
                                        <td style="width: 20%">{{ $persona->DET_DIRECCION }}</td>
                                        <td>{{ $persona->DIR_CORREO }}</td>
                                        <td>{{ $persona->NOM_ROL}}</td>
                                        <td>{{ $persona->NUM_AREA }}</td>
                                        <td>{{ $persona->NUM_CELULAR }}</td>
                                        <td>{{ $persona->IND_PERSONA_SISTEMA}}</td>
                                        <td style="width: 10%;"><a class="btn btn-warning" href="{{url('personas/' . $persona->COD_PERSONA . '/edit')}}">Editar</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>



                        </div>
                    </div>
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
                                    <option value="" selected disabled>Seleccione el sexo</option>
                                        <option>MASCULINO</option>
                                        <option>FEMENINO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Estado Civil</label>
                                    <select name="IND_PERSONA" id="IND_PERSONA" class="custom-select">
                                    <option value="" selected disabled>Seleccione un Estado</option>
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
                                    <label><span style="color: red;"></span> Fecha de Nacimiento</label>
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
                                        @foreach ($roles as $rol)
                                        <option value="{{$rol->COD_ROL}}">{{$rol->NOM_ROL}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><span style="color: red;"> *</span>Número de Área</label>
                                    <input type="text" name="NUM_AREA" class="form-control" id="NUM_AREA">
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> *</span>Número de Celular</label>
                                    <input type="text" name="NUM_CELULAR" class="form-control" id="NUM_CELULAR">
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"></span>Número fijo</label>
                                    <input type="text" name="NUM_TELEFONO" class="form-control" id="NUM_TELEFONO">
                                </div>

                            </div>
                        </div>
                        <div class="card-footer" background="color#f5f;">
                            <div class="row">
                                <div class="col-6" style="color: #f5f;">
                                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#Cancelar">Cancelar</button>
                                </div>

                                <div class="col-6">

                                    <button type="submit" class="btn  btn-primary btn-block" data-toggle="modal" data-target="#NuevaPersona">Registrar Persona <i class="fas   mr-2" data-toggle="modal"></i></button>
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