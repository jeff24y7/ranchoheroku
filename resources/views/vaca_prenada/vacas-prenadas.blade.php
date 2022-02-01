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
                <h1>Vacas Preñadas por embriones</h1>
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



                    <div class="card-body">


                        <table id="TB" class="table table-bordered table-hover US">
                            <thead>
                                <tr>
                                    <th class="text-center">Código Vaca Preñada</th>
                                    <th class="">Código Embrión</th>
                                    <th class="">Raza esperada</th>
                                    <th class="">Nombre</th>
                                    <th class="">Lugar</th>
                                    <th class="">Estado Vaca Preñada</th>
                                    <th class="">Fecha de fecundación</th>
                                    <th class="" style="width: 10%">Editar</th>
                                    <th class="" style="width: 10%">Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vacasprenadasesembriones as $vacaprenadaembrion)
                                <tr>
                                    <td class="text-center">{{ $vacaprenadaembrion->COD_PRENADA_EMBRION }}</td>
                                    <td>{{ $vacaprenadaembrion->COD_EMBRION }}</td>
                                    <td>{{ $vacaprenadaembrion->RAZ_ESPERADA }}</td>
                                    <td>{{ $vacaprenadaembrion->NOM_GANADO}}</td>
                                    <td>{{ $vacaprenadaembrion->DIR_LUGAR }}</td>
                                    <td>{{ $vacaprenadaembrion->IND_PRENADA }}</td>
                                    <td>{{ $vacaprenadaembrion->FEC_REGISTRO }}</td>
                                    <td style="width: 10%;"><a class="btn btn-warning" href="{{url('vaca_prenada/' . $vacaprenadaembrion->COD_PRENADA_EMBRION . '/edit')}}">Editar</a></td>
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