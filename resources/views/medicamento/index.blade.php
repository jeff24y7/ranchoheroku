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
                <h1>Inventario de Medicamento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                    <li class="breadcrumb-item active">Inventario Medicamento</li>
                </ol>
            </div>
        </div>
    </div>
</section>



<!---------------------------------- Tabla Medicamento  ----------------------------------------------------->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#CrearProducto"><i class="fas fa-plus-circle"></i> Agregar medicamento</button>
                </div>
                <div>
                    <div class="card-body">
                        <table id="TB" class="table table-bordered table-hover US">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Administración</th>
                                    <th>Tratamiento</th>
                                    <th>Dosis</th>
                                    <th>Cantidad</th>
                                    <th>Reorden</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>

                                </tr>
                            </thead>
                            <thead>

                            </thead>
                            <tbody>

                                @foreach($medicamentos as $medicamento)
                                <tr>
                                    <td>{{$medicamento->COD_MEDICAMENTO}}</td>
                                    <td>{{$medicamento->NOM_MEDICAMENTO}}</td>
                                    <td>{{$medicamento->ADM_MEDICAMENTO}}</td>
                                    <td>{{$medicamento->TRA_MEDICAMENTO}}</td>
                                    <td>{{$medicamento->DOS_MEDICAMENTO}}</td>
                                    <td>{{$medicamento->CAN_DISPONIBLE}}</td>
                                    <td>{{$medicamento->CAN_REORDEN}}</td>
                                    <td>{{ \Carbon\Carbon::parse($medicamento->FEC_REGISTRO)->format('d/m/Y')}}</td>
                                    <td colspan="2">

                                        <a class="btn btn-warning" href=" {{ url('medicamento/' .$medicamento->COD_MEDICAMENTO . '/edit') }}">Editar</a>
                                    </td>
                                </tr>
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




<!---------------------------------------------- 1. Formulario crear producto ------------------------------------>

<div class="modal fade" rol="dialog" id="CrearProducto">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" role="form">
                @csrf()
                <div class="modal-body">

                    <div class="box-body">

                        <h5>Agregar un nuevo medicamento </h5><br />

                        <div class="form-group">
                            <label>Nombre:</label>
                            <input name="NOM_MEDICAMENTO" placeholder="" class="form-control" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Vía Administración:</label>
                            <textarea name="ADM_MEDICAMENTO" placeholder="" class="form-control" type="text" rows="3" required> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Tratamiento:</label>
                            <textarea name="TRA_MEDICAMENTO" placeholder="" class="form-control" type="text" rows="3" required> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Dosis:</label>
                            <textarea name="DOS_MEDICAMENTO" placeholder="" class="form-control" type="text" rows="3" required> </textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="CAN_REORDEN" placeholder="Reorden" type="number" min="1" required />
                        </div>
                    </div>

                </div>


                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Agregar</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>

                </div>



            </form>

        </div>

    </div>

</div>

<!---------------------------------------------- fin Formulario crear producto------------------------------------>

<!---------------------------------------------- 2. Inicio Formulario editar producto ------------------------------------>


<!---------------------------------------------- Fin Formulario editar producto ------------------------------------>

<!--------------------------------------------- 3. Inicio Formulario borrar producto ------------------------------------>

<div class="modal fade" rol="dialog" id="EliminarProducto">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" role="form">

                <div class="modal-body">

                    <div class="box-body">

                        <h5>ELIMINAR!</h5>
                        <p>¿Deseas eliminar definiticamente el registro?</p>
                        <br />

                        <input name="Did1" id="Did1" placeholder="" class="form-control" type="hidden">

                    </div>

                </div>


                <div class="modal-footer">

                    <button type="submit" class="btn btn-danger"><i class="fas fa-check-circle"></i> Aceptar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>

                </div>



            </form>

        </div>

    </div>

</div>
<!---------------------------------------------- Fin  Formulario borrar producto ------------------------------------>




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
