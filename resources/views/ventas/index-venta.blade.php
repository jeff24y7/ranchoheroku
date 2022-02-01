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
                <h1>REGISTRO VENTA DE GANADO</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                    <li class="breadcrumb-item active">Ventas</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--------------------------------- Formulario para el código del cliente --------------------------------------------------->


<!--------------------------------- Fin del formulario para el código del cliente --------------------------------------------------->

<!--------------------------------- Formulario con datos iniciales de venta ganado --------------------------------------------------->



<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="card-header">
                        <div class="box-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#Crearventa"><i class="fas fa-plus-circle"></i> Agregar nueva venta</button>
                        </div>

                    </div>
                </div>

                <div class="card-body">


                    <!-- Tabla de ventas -->



                    <table id="TB" class="table table-bordered table-hover US">



                        <thead>
                            <tr>
                                <th>Código Venta</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cliente</th>
                                <th>Fecha Registro </th>
                                <th>Eliminar </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $ventas)
                            <tr>
                                <td>{{ $ventas->COD_VENTA }}</td>
                                <td>{{ $ventas->NOM_GANADO}}</td>
                                <td>{{ $ventas->PRE_VENTA }}</td>
                                <td>{{ $ventas->CLIETE}}</td>
                                <td>{{ $ventas->FEC_REGISTRO }}</td>
                                </td>

                                <form action="{{ url('ventas' , $ventas->COD_DETALLE) }}" method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <td>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#EliminarRegistro"></i> Eliminar</button>

                                        <div class="modal fade" rol="dialog" id="EliminarRegistro">

                                            <div class="modal-dialog">

                                                <div class="modal-content">

                                                    <form method="post" role="form">

                                                        <div class="modal-body">

                                                            <div class="box-body">

                                                                <h5>ELIMINAR!</h5>
                                                                <p>¿Deseas eliminar definitivamente el registro?</p>
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
<!------------------------------------ fin de la tabla ----------------------------------------------------->



<!---------------------------------------------- Formulario crear el detalle de ventas ------------------------------------>



<div class="modal fade" rol="dialog" id="Crearventa">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" role="form">
                @csrf()
                <div class="modal-body">

                    <div class="box-body">

                        <h5>Agregar una nueva venta </h5><br />

                        <div class="form-group">
                            <label> Cliente</label>

                            <select name="COD_PERSONA" class="form-control">
                                <option value="" selected disabled>Seleccione su cliente</option>
                                <tbody>
                                    @foreach ($datos["clientes"] as $cliente)
                                    <option value="{{$cliente->COD_PERSONA}}">{{$cliente->PERSONA}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha compra</label>
                            <input name="FEC_VENTA" placeholder="" id="fecha-compraG" class="form-control" id="fecha-compraG" type='date' min="1900-01-01" max="">
                        </div>
                        <label><span style="color: red;"> * </span>Número de arete:</label>
                        <select name="COD_REGISTRO_GANADO" class="form-control">
                            <option value="" selected disabled>Seleccione la vaca a vender</option>
                            @foreach ($datos["ganados"] as $ganado)
                            <option value="{{$ganado->COD_REGISTRO_GANADO}}">{{$ganado->NOM_GANADO}}</option>
                            @endforeach
                        </select>

                        <div class="form-group">
                            <label>Precio de venta</label>
                            <input name="PRE_VENTA" placeholder="" class="form-control" type="number" requerid>
                        </div>
                    </div>

                </div>
                <div class="card-footer" background="color#f5f;">
                    <div class="row">
                        <div class="col-6" style="color: #f5f;">
                            <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#Cancelar">Cancelar</button>
                        </div>

                        <div class="col-6">

                            <button type="submit" class="btn  btn-primary btn-block" data-toggle="modal" data-target="#RegistrarVenta">Registrar Venta <i class="fas   mr-2" data-toggle="modal"></i></button>
                        </div>
                    </div>
                </div>



            </form>

        </div>

    </div>

</div>

<!---------------------------------------------- fin Formulario crear ventas------------------------------------>

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