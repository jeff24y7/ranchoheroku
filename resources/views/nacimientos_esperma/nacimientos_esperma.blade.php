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
                        <h1>Nacimientos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                            <li class="breadcrumb-item active">Nacimientos</li>
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
                            <button class="btn btn-primary" data-toggle="modal" data-target="#RegistrarNacimiento"><i class="fas fa-plus-circle"></i>Registrar Nacimiento</button>
                        </div>
                        <div>
                            <div class="card-body">
                                <table id="TB" class="table table-bordered table-hover US">
                                    <thead>
                                        <tr>
                                            <th>Código Nacimiento</th>
                                            <th>Código Registro Ganado</th>
                                            <th>Nombre Ternero</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($nacimientosesperma as $nacimientoesperma)
                                        <tr>
                                            <td>{{$nacimientoesperma->COD_NACIMIENTO_ESPERMA}}</td>
                                            <td>{{$nacimientoesperma->COD_REGISTRO_GANADO}}</td>
                                            <td>{{$nacimientoesperma->NOM_GANADO}}</td>
                                            <td>{{ \Carbon\Carbon::parse($nacimientoesperma->FEC_NACIMIENTO)->format('d/m/Y')}}</td>
                                            <td colspan="2">

                                                <a class="btn btn-warning" href=" {{ url('nacimientos_esperma/' .$nacimientoesperma->COD_NACIMIENTO_ESPERMA . '/edit') }}">Editar</a>
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
        </div>

        <div class="modal fade" rol="dialog" id="RegistrarNacimiento">
            <div class="modal-dialog modal-xl" class="col-12">

                <div class="modal-content">

                    <form method="post" role="form">
                        @csrf()
                        <div class="modal-header">
                            <h3>Nuevo registro de Nacimiento.</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="card-title">DATOS DELTERNERO</h5>
                                    <p class="card-text">
                                    <p><span style="color: red;"> * Campos obrigatorios </span></p>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Número de Arete:</label>
                                        <input name="NUM_ARETE" placeholder="" id="NUM_ARETE" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Nombre:</label>
                                        <input name="NOM_GANADO" placeholder="" id="NOM_GANADO" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"></span>Color:</label>
                                        <input name="CLR_GANADO" placeholder="" id="CLR_GANADO" class="form-control" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>ESTADO:</label>
                                        <select name="COD_ESTADO" class="form-control">
                                            <option value="" selected disabled>Seleccione un Estado</option>
                                            @foreach ($datos["estados"] as $estado)
                                            <option value="{{$estado->COD_ESTADO}}">{{$estado->DET_ESTADO}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>LUGAR:</label>
                                        <select name="COD_LUGAR" class="form-control">
                                            <option value="" selected disabled>Seleccione un Lugar</option>
                                            @foreach ($datos["lugares"] as $lugar)
                                            <option value="{{$lugar->COD_LUGAR}}">{{$lugar->DIR_LUGAR}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label><span style="color: red;"></span>Peso:</label>
                                        <input name="PES_ACTUAL" placeholder="" id="PES_ACTUAL" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Fierro:</label>
                                        <input name="FIE_GANADO" placeholder="" id="FIE_GANADO" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Raza:</label>
                                        <input name="RAZ_GANADO" placeholder="" id="RAZ_GANADO" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Sexo:</label>
                                        <select name="SEX_GANADO" id="SEX_GANADO" class="form-control" required>
                                            <option value="1">MACHO </option>
                                            <option value="2">HEMBRA</option>
                                        </select><br />
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Vaca que lo parió</label>
                                        <select name="COD_GANADO" id="COD_GANADO" class="form-control" required>
                                            <option value="" selected disabled>Seleccione una vaca</option>
                                            @foreach ($datos["recienp_esperma"] as $vrecienp)
                                            <option value="{{$vrecienp->COD_REGISTRO_GANADO}}">{{$vrecienp->NOM_GANADO}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"></span> Fecha de Nacimiento</label>
                                        <input name="FEC_NACIMIENTO" placeholder="" id="FEC_NACIMIENTO" class="form-control" id="fecha" type='date' min="1900-01-01" max="">
                                    </div>





                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6" style="color: #f5f;">
                                    <button class="btn btn-danger btn-block " data-toggle="modal" data-target="#Cancelar">Cancelar</button>
                                </div>

                                <div class="col-6">
                                    <button class="btn  btn-primary btn-block" data-toggle="modal" data-target="#RegistrarGanado">Registrar Ganado <i class="fas   mr-2" data-toggle="modal"></i></button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

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