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
				<h1>Reportes</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
					<li class="breadcrumb-item active">Reportes</li>
				</ol>
			</div>
		</div>
		<div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#GenerarReportes"><i class="fas fa-plus-circle"></i> Nuevo reporte</button>
		</div>
	</div>
</section>


<!--------------------------------- Formulario con datos iniciales de compra --------------------------------------------------->




<!----------------------------------Tabla dinamica ------------------------------------------------>


<!---------------------------------- Fin tabla dinamica -------------------------------------------->


<!---------------------------------------------- Formulario ------------------------------------>

<div class="modal fade" rol="dialog" id="GenerarReportes">
	<div class="modal-dialog ">
		<div class="modal-content">
			<form accion="{{url('reportes')}}" method="POST" role="form">
				@csrf()
				<div class="modal-header">
					<h3 class="">Nuevo Reporte</h3>
				</div>
				<div class="modal-body row col-12">
					<div class="col-md-12">
						<p><span style="color: red;"> * Campos obrigatorios </span></p>

					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label><span style="color: red;"> * </span>Tipo Reporte</label>
							<select class="custom-select" name="reporte" requerid>
								<option value="" selected disabled>Seleccione un Tipo</option>
								<option value="1">Producción Leche</option>
								<option value="2">Compra Ganado</option>
								<option value="3">Venta Ganado</option>
							</select>
						</div>
						<div class="form-group">
							<label><span style="color: red;"> * </span>Desde:</label>
							<input class="form-control" name="inicio" placeholder="" type='date' required>
						</div>


					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Hasta:</label>
							<input class="form-control" name="final" placeholder="" type='date' >
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">

						<div class="col-6">
							<button type="submit" class="btn btn-block btn-primary btn-block" data-toggle="modal" data-target="">Generar</button>

						</div>
						<div class="col-6">
							<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
						</div>

					</div>
				</div>

		</div>
	</div>

	</form>

</div>


    </x-slot>


</x-app-layout>




<strong>Copyright &copy; 2014-2020 <a href="#">Rancho</a>.</strong> All rights reserved.




@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
