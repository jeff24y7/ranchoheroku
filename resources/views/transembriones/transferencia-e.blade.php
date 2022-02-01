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
                        <h1>Registro de Transferencia de embriones</h1>
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
                            <div class="box-header">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevaTransferenciaEmbrion"></i> Registrar Transferencia</button>
                            </div>
                        </div>


                        <div class="card-body">


                            <table id="TB" class="table table-bordered table-hover US">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="">Código Embrión</th>
                                        <th class="">Raza vaca donadora</th>
                                        <th class="">Raza toro donadora</th>
                                        <th class="">Vaca Receptora</th>
                                        <th class="">Estado Embrion</th>
                                        <th class="">Fecha de Registro</th>
                                        <th class="" style="width: 10%">Editar</th>
                                        <th class="" style="width: 10%">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transembriones as $transembrion)
                                    <tr>
                                        <td class="text-center">{{ $transembrion->COD_TRANS_EMBRION }}</td>
                                        <td>{{ $transembrion->COD_EMBRION }}</td>
                                        <td>{{ $transembrion->RAZ_VACA_DONADORA }}</td>
                                        <td>{{ $transembrion->RAZ_TORO_DONADOR }}</td>
                                        <td>{{ $transembrion->NOM_GANADO }}</td>
                                        <td>{{ $transembrion->IND_FECUNDACION }}</td>
                                        <td style="width: 20%">{{ $transembrion->FEC_REGISTRO }}</td>
                                        <td style="width: 10%;"><a class="btn btn-warning" href="{{url('transembriones/' . $transembrion->COD_TRANS_EMBRION . '/edit')}}">Editar</a></td>
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

        <div class="modal fade" rol="dialog" id="NuevaTransferenciaEmbrion">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form method="post" role="form">
                        @csrf()
                        <div class="modal-body">

                            <div class="box-body">

                                <h5>Agregar transferencia de embrión </h5><br />
                                <h9>Campos oligatorios <span style="color: red;"> * </span></h9><br />
                                <h12> </h12><br />

                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>CÓDIGO EMBRION</label>
                                    <select name="COD_EMBRION" class="form-control">
                                        <option value="" selected disabled>Seleccione un embrión</option>
                                        @foreach ($datos["detalles"] as $detalleembrion)
                                        <option value="{{$detalleembrion->COD_EMBRION}}">{{$detalleembrion->DONADORES}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Vaca a fecundar</label>
                                    <select name="COD_REGISTRO_GANADO" class="form-control">
                                        <option value="" selected disabled>Seleccione la vaca a fecundar</option>
                                        @foreach ($datos["vacassincro"] as $vsincronizadas)
                                        <option value="{{$vsincronizadas->COD_REGISTRO_GANADO}}">{{$vsincronizadas->NOM_GANADO}}</option>
                                        @endforeach
                                    </select>
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