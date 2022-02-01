@extends('layout')
@section('titulo', 'Crear')
@section('contenido')
<form action="{{url('compras')}}" method="post">
	@csrf()
	<input class="form-control" placeholder="PROVEEDOR" name="FECHA" type="date" value="{{date('Y-m-d')}}" />
	<select class="custom-select" name="PERSONA">
		<option>1</option>
		<option>2</option>
	</select>
	<input class="form-control" name="ARETE" type="number" min="1" placeholder="ARETE" />
	<input class="form-control" name="NOMBRE" placeholder="NOMBRE GANADO" />
	<input class="form-control" name="COLOR" placeholder="COLOR" />
	<input class="form-control" name="ESTADO" min="1" placeholder="CODIGO ESTADO" type="number" />
	<select class="custom-select" name="LUGAR">
		<option>1</option>
		<option>2</option>
		<option>3</option>
	</select>
	<input class="form-control" name="PESO" type="number" placeholder="PESO" />
	<input class="form-control" name="FIERRO" placeholder="FIERRO" />
	<input class="form-control" name="RAZA" placeholder="RAZA" />
	<select class="custom-select" name="SEXO">
		<option>MACHO</option>
		<option>HEMBRA</option>
	</select>
	<input class="form-control" name="PRECIO" type="number" placeholder="PRECIO" min=".01" step=".01" />
	<input type="submit" value="Crear" class="bnt btn-primary">
</form>

@endsection