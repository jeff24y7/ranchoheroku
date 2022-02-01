@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop
@include('components.flash_alerts')
@section('content')

<x-app-layout>
    <x-slot name="header">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Producción de leche</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                            <li class="breadcrumb-item active">Producción de leche</li>
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

                                <button class="btn btn-1 btn-primary" data-toggle="modal" data-target="#crearregistro"><i class="fas fa-plus-circle"></i> Registro producción de leche</button>

                            </div>
                        </div>
                        <div class="card-body">

                            <table id="TB" class="table table-bordered table-hover US">
                                <thead>
                                    <tr>
                                        <th>Código Registro leche</th>
                                        <th>Nombre</th>
                                        <th>Fecha de Ordeño</th>
                                        <th>Día de Lactancia </th>
                                        <th>Producción (lts) </th>
                                        <th>Observaciones </th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produccion_leche as $produccion_leche)
                                    <tr>
                                        <td>{{ $produccion_leche->COD_REGISTRO_LECHE }}</td>
                                        <td>{{ $produccion_leche->NOM_GANADO}}</td>

                                        <td>{{\Carbon\Carbon::parse($produccion_leche->FEC_ORDENIO)->format('d/m/Y')}}</td>
                                        <td>{{ $produccion_leche->DIA_LACTANCIA }}</td>
                                        <td>{{ $produccion_leche->PRD_LITROS }}</td>
                                        <td>{{ $produccion_leche->OBS_REGISTRO }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ url('produccion_leche/' . $produccion_leche->COD_REGISTRO_LECHE . '/edit')}}">Editar</a>
                                        </td>
                                        <td>
                                            <!-- boton de eliminar -->
                                            <button type="submit" class="btn btn-danger" form="delete_{{$produccion_leche->COD_REGISTRO_LECHE}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">

                                                Eliminar

                                            </button>

                                            <form action="{{route('produccion_leche.destroy', $produccion_leche->COD_REGISTRO_LECHE)}}" id="delete_{{$produccion_leche->COD_REGISTRO_LECHE}}" method="post" enctype="multipart/form-data" hidden>
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                            <!-- ----- -->
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

        <div class="modal fade" rol="dialog" id="crearregistro">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form method="post" role="form">
                        @csrf()
                        <div class="modal-body">

                            <div class="box-body">


                                <h5>Agregar un nuevo registro </h5><br />
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Nombre de la vaca</label>
                                    <select name="COD_REGISTRO_GANADO" class="form-control">
                                        <option value="" selected disabled>Seleccione la vaca</option>
                                        @foreach ($datos["ganados"] as $ganado)
                                        <option value="{{$ganado->COD_REGISTRO_GANADO}}">{{$ganado->NOM_GANADO}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">

                                    <label>Fecha de Ordeño</label>
                                    <input name="FEC_ORDEÑO" placeholder="" class="form-control" type="date" required value="{{ old('FEC_ORDEÑO') }}">
                                </div>
                                <div class="form-group">
                                    <label>Día de Lactancia</label>
                                    <input name="DIA_LACTANCIA" placeholder="" class="form-control" type="number" requerid value="{{ old('DIA_LACTANCIA') }}">
                                </div>

                                <div class="form-group">
                                    <label>Producción en litros</label>
                                    <input name="PRD_LITROS" placeholder="" class="form-control" type="decimal" requerid value="{{ old('PRD_LITROS') }}">

                                </div>

                                <div class="form-group">
                                    <label>Observación:</label>
                                    <input name="OBS_REGISTRO" placeholder="" class="form-control" type="text" requerid value="{{ old('OBS_REGISTRO') }}">
                                </div>
                            </div>

                        </div>


                        <div class="card-footer" background="color#f5f;">
                            <div class="row">
                                <div class="col-6" style="color: #f5f;">
                                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#Cancelar">Cancelar</button>
                                </div>

                                <div class="col-6">

                                    <button type="submit" class="btn  btn-primary btn-block" data-toggle="modal" data-target="#crearregistro">Registrar <i class="fas   mr-2" data-toggle="modal"></i></button>
                                </div>
                            </div>
                        </div>



                    </form>

                </div>

            </div>

        </div>


        <!---------------------------------------------- fin Formulario crear producto------------------------------------>

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