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
                        <h1>Orden de Trabajo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                            <li class="breadcrumb-item active">Orden Trabajo</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <!---------------------------------- Tabla orden de trabajo ----------------------------------------------------->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#OrdenTrabajo"><i class="fas fa-plus-circle"></i> Agregar Orden</button>
                        </div>
                        <div>
                            <div class="card-body">
                                <table id="TB" class="table table-bordered table-hover US">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Medicamento</th>
                                            <th>Cantidad</th>
                                            <th>Fecha registro</th>
                                        </tr>
                                    </thead>
                                    <thead>

                                    </thead>
                                    <tbody>

                                        @foreach($ordenesT as $ordenT)
                                        <tr>
                                            <td>{{$ordenT->COD_ORDENT}}</td>
                                            <td>{{$ordenT->NOM_MEDICAMENTO}}</td>
                                            <td>{{$ordenT->CAN_MEDICAMENTO}}</td>
                                            <td>{{\Carbon\Carbon::parse($ordenT->FEC_REGISTRO)->format('d/m/Y')}}</td>
                                            @endforeach

                                    </tbody>
                                </table>

                            </div>


                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---------------------------------- Fin tabla dinamica -------------------------------------------->

        <!---------------------------------- Formulario Orden de trabajo -------------------------------------------->
        <div class="modal fade" rol="dialog" id="OrdenTrabajo">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <form method="POST" role="form">
                        @csrf()
                        <div class="modal-header">
                            <h3 class="">Registro orden de trabajo</h3>
                        </div>
                        <div class="modal-body row col-12">
                            <div class="col-md-12">
                                <p><span style="color: red;"> * Campos obrigatorios </span></p>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Medicamento:</label>
                                    <select name="COD_MEDICAMENTO" class="form-control">
                                        <option value="" selected disabled>Seleccione un Medicamento</option>
                                        @foreach ($medicamentos as $medicamento)
                                        <option value="{{$medicamento->COD_MEDICAMENTO}}">{{$medicamento->NOM_MEDICAMENTO}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Cantidad:</label>
                                    <input class="form-control" name="CAN_MEDICAMENTO" placeholder="" type='number' required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">

                                <div class="col-6">
                                    <button type="submit" class="btn btn-block btn-primary btn-block" data-toggle="modal" data-target="">Registrar</button>

                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
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