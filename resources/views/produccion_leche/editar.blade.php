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
            <h1>Registro de Leche</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
              <li class="breadcrumb-item active">Actualizar Registro</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <!-------------------------------- Formulario para editar medicamento ----------------------------------->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Editar datos de registro leche</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('produccion_leche', $produccion_leche->COD_REGISTRO_LECHE)  }}" method="post">
          @csrf()
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label>Código de ganado</label>
              <input class="form-control" name="COD_REGISTRO_GANADO" type="number" placeholder="Nombre" value="{{ $produccion_leche->COD_REGISTRO_GANADO }}" required />
            </div>
            <div class="form-group">
              <label>Fecha de ordeño</label>
              <textarea class="form-control" name="FEC_ORDEÑO" placeholder="" type="date" value="{{date('Y-m-d')}}" required>{{ $produccion_leche->FEC_ORDENIO}}</textarea>
            </div>
            <div class="form-group">
              <label>Día de lactancia</label>
              <textarea class="form-control" name="DIA_LACTANCIA" type="number" placeholder="Tratamiento" required>{{ $produccion_leche->DIA_LACTANCIA }}</textarea>
            </div>
            <div class="form-group">
              <label>Producción en litros</label>
              <textarea class="form-control" name="PRD_LITROS" type="number" placeholder="Dosis" required>{{ $produccion_leche->PRD_LITROS }}</textarea>
            </div>
            <div class="form-group">
              <label>Observación</label>
              <textarea class="form-control" name="OBS_REGISTRO" placeholder="Observacion" type="text" required>{{ $produccion_leche->OBS_REGISTRO }}</textarea>
            </div>
          </div>
          <div class="card-footer" background="color#f5f;">
            <div class="row">
              <div class="col-6" style="color: #f5f;">
                <button class="btn btn-default btn-block " did="" data-toggle="modal" data-target="#Cancelar" data-dismiss="modal">Cancelar</button>
              </div>
              <div class="col-6">
                <button class="btn  btn-primary btn-success" type="submit" data-toggle="modal" data-target="#RegistrarPersona">Editar Registro <i class="fas   mr-2" data-toggle="modal"></i></button>
              </div><br></br>
            </div>
          </div>
        </form>
      </div>
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