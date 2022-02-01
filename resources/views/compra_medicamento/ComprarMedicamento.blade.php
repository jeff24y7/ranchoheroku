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
            <h1>Compras de Medicamentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
              <li class="breadcrumb-item active">Compra Medicamento</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!---------------------------------- Tabla Medicamento  -------------------------------------------------->

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="box-header">

                <button class="btn btn-primary" data-toggle="modal" data-target="#ComprarMedicamento"><i class="fas fa-plus-circle"></i>Registrar Compra</button>

                <button class="btn btn-1 btn-primary" data-toggle="modal" data-target="#NuevaPersona"><i class="fas fa-plus-circle"></i> Agregar Proveedor </button>


              </div>
            </div>
            <div>
              <div class="card-body">

                <table id="TB" class="table table-bordered table-hover US">
                  <thead>
                    <tr>

                      <th>Código Compra</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Vencimiento</th>
                      <th>Fecha Compra</th>
                      <th>Proveedor</th>
                      <th>Fecha Registro</th>

                    </tr>
                  </thead>
                  <thead>

                  </thead>
                  <tbody>

                    @foreach($ComprarMedicamentos as $ComprarMedicamento)
                    <tr>
                      <td>{{$ComprarMedicamento->COD_COMPRA_MEDICAMENTO}}</td>
                      <td>{{$ComprarMedicamento->NOM_MEDICAMENTO}}</td>
                      <td>{{$ComprarMedicamento->CAN_MEDICAMENTO}}</td>
                      <td>{{$ComprarMedicamento->PRE_UNITARIO}}</td>
                      <td>{{\Carbon\Carbon::parse($ComprarMedicamento->FEC_VENCIMIENTO)->format('d/m/Y')}}</td>
                      <td>{{\Carbon\Carbon::parse($ComprarMedicamento->FEC_COMPRA)->format('d/m/Y')}}</td>
                      <td>{{$ComprarMedicamento->PERSONA}}</td>
                      <td>{{\Carbon\Carbon::parse($ComprarMedicamento->FEC_REGISTRO)->format('d/m/Y')}}</td>


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

    <!---------------------------------------------- Formulario comprar medicamento ------------------------------------>

    <div class="modal fade" rol="dialog" id="ComprarMedicamento">

      <div class="modal-dialog">

        <div class="modal-content">

          <form method="post" role="form">
            @csrf
            <div class="modal-body">

              <div class="box-body">

                <h5>Registro de compra medicamento </h5><br />

                <div class="form-group">

                  <label><span style="color: red;"> * </span>Medicamento:</label>
                  <select name="COD_MEDICAMENTO" class="form-control">
                    <option value="" selected disabled>Seleccione un Medicamento</option>
                    @foreach ($datos["medicamentos"] as $medicamento)
                    <option value="{{$medicamento->COD_MEDICAMENTO}}">{{$medicamento->NOM_MEDICAMENTO}}</option>
                    @endforeach
                  </select><br>

                  <label><span style="color: red;"> * </span>Cantidad comprada:</label>
                  <input name="CAN_MEDICAMENTO" placeholder="" class="form-control" type="number" required>

                  <label><span style="color: red;"> * </span>Precio unitario:</label>
                  <input name="PRE_UNITARIO" placeholder="" class="form-control" type="number" required>

                  <label><span style="color: red;"> * </span>Fecha de vencimento:</label>
                  <input name="FEC_VENCIMIENTO" placeholder="" class="form-control" type="date" required>

                  <label><span style="color: red;"> * </span>Fecha de compra:</label>
                  <input name="FEC_COMPRA" placeholder="" class="form-control" type="date" required>

                  <label><span style="color: red;"> * </span>Proveedor:</label>
                  <select name="COD_PERSONA" class="form-control">
                    <option value="" selected disabled>Seleccione un proveedor</option>
                    @foreach ($datos["proveedores"] as $proveedor)
                    <option value="{{$proveedor->COD_PERSONA}}">{{$proveedor->PERSONA}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

            </div>


            <div class="modal-footer">

              <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Registrar</button>

              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>

            </div>



          </form>

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
                    <option>MASCULINO</option>
                    <option>FEMENINO</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Estado Civil</label>
                  <select name="IND_PERSONA" id="IND_PERSONA" class="custom-select">
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
                  <label><span style="color: red;"> *</span> Fecha de Nacimiento</label>
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
                  <select name="COD_ROL" id="COD_ROL" class="custom-select">
                    <option value="" selected disabled>Seleccione un Rol</option>
                    <option value=2>EMPLEADO</option>
                    <option value=3>CLIENTE</option>
                    <option value=4>PROVEEDOR</option>
                  </select>
                </div>

                <div class="form-group">
                  <label><span style="color: red;"> *</span>Número de Área</label>
                  <input type="text" name="NUM_AREA" class="form-control" id="NUM_AREA">
                </div>
                <div class="form-group">
                  <label><span style="color: red;"> *</span>Número de fijo</label>
                  <input type="text" name="NUM_TELEFONO" class="form-control" id="NUM_TELEFONO">
                </div>
                <div class="form-group">
                  <label>Número de teléfono celular</label>
                  <input type="text" name="NUM_CELULAR" class="form-control" id="NUM_CELULAR">
                </div>
              </div>
            </div>
            <div class="card-footer" background="color#f5f;">
              <div class="row">
                <div class="col-6" style="color: #f5f;">
                  <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#Cancelar">Cancelar</button>
                </div>

                <div class="col-6">

                  <button type="submit" class="btn  btn-primary btn-block" data-toggle="modal" data-target="#RegistrarPersona">Registrar Persona <i class="fas   mr-2" data-toggle="modal"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>

       </div>
    </div>
    <!---------------------------------------------- Fin Formulario comprar medicamento ------------------------------------>







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