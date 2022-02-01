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
                        <h1>Montas de toro</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                            <li class="breadcrumb-item active">Ganado</li>
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

                            <div class="card-header">
                                <div class="box-header">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevaMonta"></i> Registrar Transferencia</button>
                                </div>
                            </div>

                            <div class="card-body">


                                <table id="TB" class="table table-bordered table-hover US">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Código</th>
                                            <th class="">Vaca montada</th>
                                            <th class="">Raza del Toro</th>
                                            <th class="">Fecha de monta</th>
                                            <th class="">Estado </th>
                                            <th class="" style="width: 10%">Editar</th>
                                            <th class="" style="width: 10%">Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transmontas as $transmonta)
                                        <tr>
                                            <td class="text-center">{{ $transmonta->COD_MONTA }}</td>
                                            <td>{{ $transmonta->NOM_GANADO }}</td>
                                            <td>{{ $transmonta->RAZ_TORO_MONTA }}</td>
                                            <td>{{ $transmonta->FEC_MONTA }}</td>
                                            <td>{{ $transmonta->IND_FECUNDACION}}</td>
                                            <td style="width: 10%;"><a class="btn btn-warning" href="{{url('transmonta/' . $transmonta->COD_MONTA . '/edit')}}">Editar</a></td>
                                            <td style="width: 10%;">

                                                <input class="btn btn-danger" type="submit" value="Eliminar" />

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
            <div class="modal fade" rol="dialog" id="NuevaMonta">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form method="post" role="form">
                            @csrf()
                            <div class="modal-body">

                                <div class="box-body">

                                    <h5>Registrar Monta </h5><br />
                                    <h9>Campos oligatorios <span style="color: red;"> * </span></h9><br />
                                    <h12> </h12><br />

                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Vaca montada</label>
                                        <select name="COD_REGISTRO_GANADO" class="form-control">
                                            <option value="" selected disabled>Seleccione la Vaca montada</option>
                                            @foreach ($datos["vacassincro"] as $vsincronizadas)
                                            <option value="{{$vsincronizadas->COD_REGISTRO_GANADO}}">{{$vsincronizadas->NOM_GANADO}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Fecha Monta</label>
                                        <input name="FEC_MONTA" placeholder="" class="form-control" type="date" required>
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Raza Toro:</label>
                                        <input name="RAZ_TORO" placeholder="" id="RAZ_TORO" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select name="IND_FECUNDACION" disabled class="form-control">
                                            <option></option>
                                            <option>FECUNDÓ</option>
                                            <option>NO FECUNDÓ</option>
                                        </select>
                                    </div>


                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-1"><i class="fas fa-plus-circle"></i> Agregar</button>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>

                                    </div>

                                </div>
                            </div>


                        </form>

                    </div>

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