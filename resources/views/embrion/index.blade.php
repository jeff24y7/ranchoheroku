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
						<h1>Compra de Embriones</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
							<li class="breadcrumb-item active">Compra embrion</li>
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

								<button class="btn btn-primary" data-toggle="modal" data-target="#CompraEmbrion"><i class="fas fa-plus-circle"></i> Agregar compra de embrion</button>



								<button class="btn btn-1 btn-primary" data-toggle="modal" data-target="#CrearProveedor"><i class="fas fa-plus-circle"></i> Agregar Proveedor </button>

							</div>
						</div>
						<div>
							<div class="card-body">
								<div class="box-header">

									<table id="TB" class="table table-bordered table-hover US">
										<thead>
											<tr>

												<th>Código Compra</th>
												<th>Código Embrión</th>
												<th>Raza Esperada</th>
												<th>Raza Vaca Donadora</th>
												<th>Raza Toro Donador</th>
												<th>Precio</th>
												<th>Observación</th>
												<th>Estado Embrión</th>
												<th>Fecha Registro</th>
											</tr>
										</thead>
										<tbody>
											@foreach($embrion as $embrion)
											<tr>
												<td>{{ $embrion->COD_COMPRA_EMBRION}}</td>
												<td>{{ $embrion->COD_EMBRION}}</td>
												<td>{{ $embrion->RAZ_ESPERADA }}</td>
												<td>{{ $embrion->RAZ_VACA_DONADORA }}</td>
												<td>{{ $embrion->RAZ_TORO_DONADOR }}</td>
												<td>{{ $embrion->PRE_EMBRION }}</td>
												<td>{{ $embrion->OBS_COMPRA_EMBRION }}</td>
												<td>{{ $embrion->IND_EMBRION }}</td>
												<td>{{ $embrion->FEC_REGISTRO }}</td>

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


			<!---------------------------------------------- Formulario crear producto ------------------------------------>

			<div class="modal fade" rol="dialog" id="CompraEmbrion">

				<div class="modal-dialog modal-xl" class="col-12">

					<div class="modal-content">

						<form method="post" role="form">
							@csrf()

							<div class="modal-body">

								<div class="box-body">

									<h5>Agregar compra de embrion </h5><br />
									<h9>Campos oligatorios <span style="color: red;"> * </span></h9><br />
									<h12> </h12><br />
									<div class="modal-body row col-md-12">
										<div class="col-sm-6">
											<div class="form-group">
												<label><span style="color: red;"> * </span>Proveedor:</label>
												<select name="COD_PERSONA" class="form-control">
													<option value="" selected disabled>Seleccione un proveedor</option>
													@foreach ($datos["proveedores"] as $proveedor)
													<option value="{{$proveedor->COD_PERSONA}}">{{$proveedor->PERSONA}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label><span style="color: red;"> * </span>Fecha de compra</label>
												<input class="form-control" placeholder="FECHA" name="FEC_COMPRA" type="date" value="{{date('Y-m-d')}}" requerid>
											</div>
											<div class="form-group">
												<label><span style="color: red;"> * </span>Raza esperada</label>
												<input class="form-control" name="RAZ_ESPERADA" placeholder="Raza esperada" type="text" required />
											</div>
											<div class="form-group">
												<label><span style="color: red;"> * </span>Nombre donadora</label>
												<input class="form-control" name="NOM_VACA_DONADORA" placeholder="Nombre donadora" type="text" />
											</div>
											<div class="form-group">
												<label>Raza donadora</label>
												<input name="RAZ_VACA_DONADORA" placeholder="Raza donadora" class="form-control" type="text">
											</div>
											<div class="form-group">
												<label>Raza del donador</label>
												<input name="RAZ_TORO_DONADOR" placeholder="Raza del donador" class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">

											<div class="form-group">
												<label>Nombre del donador</label>
												<input name="NOM_TORO_DONADOR" placeholder="Nombre del donador" class="form-control" type="text">
											</div>
											<div class="form-group">
												<label><span style="color: red;"> * </span>Precio</label>
												<input class="form-control" name="PRE_EMBRION" placeholder="PRECIO" type="number" min="1" required />
											</div>
											<div class="form-group">
												<label><span style="color: red;"> * </span>Fecha de registro</label>
												<input class="form-control" placeholder="Fecha registro" name="FEC_REGISTRO" type="date" value="{{date('Y-m-d')}}" requerid>
											</div>
											<div class="form-group">
												<label>Observaciones</label>
												<input name="OBS_COMPRA_EMBRION" placeholder="Observaciones" class="form-control" type="text">
											</div>
											<div class="form-group">
												<label><span style="color: red;"> * </span>Fecha de compra</label>
												<input class="form-control" placeholder="FECHA" name="FEC_REGISTRO" type="date" value="{{date('Y-m-d')}}" requerid>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-6" style="color: #f5f;">
											<button type="submit" class="btn btn-primary btn-block" data-target="#CompraEmbrion"><i class="fas fa-plus-circle"></i> Agregar</button>
										</div>

										<div class="col-6">

											<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
										</div>
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