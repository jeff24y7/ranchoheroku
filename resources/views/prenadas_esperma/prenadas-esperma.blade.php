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
                        <h1>Vacas Preñadas por esperma</h1>
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



                        <div class="card-body">


                            <table id="TB" class="table table-bordered table-hover US">
                                <thead>
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="">Número de pajilla</th>
                                        <th class="">Raza toro donador</th>
                                        <th class="">Nombre</th>
                                        <th class="">Lugar</th>
                                        <th class="">Estado Vaca Preñada</th>
                                        <th class="">Fecha de fecundación</th>
                                        <th class="" style="width: 10%">Editar</th>
                                        <th class="" style="width: 10%">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vacasprenadasesperma as $vacaprenadaesperma)
                                    <tr>
                                        <td class="text-center">{{ $vacaprenadaesperma->COD_PRENADA_ESPERMA }}</td>
                                        <td>{{ $vacaprenadaesperma->NUM_PAJILLA }}</td>
                                        <td>{{ $vacaprenadaesperma->RAZ_TORO_DONADOR }}</td>
                                        <td>{{ $vacaprenadaesperma->NOM_GANADO}}</td>
                                        <td>{{ $vacaprenadaesperma->DIR_LUGAR }}</td>
                                        <td>{{ $vacaprenadaesperma->IND_PRENADA }}</td>
                                        <td>{{ $vacaprenadaesperma->FEC_REGISTRO }}</td>
                                        <td style="width: 10%;"><a class="btn btn-warning" href="{{url('prenadas_esperma/' . $vacaprenadaesperma->COD_PRENADA_ESPERMA . '/edit')}}">Editar</a></td>
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