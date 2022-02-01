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
            <h1>Medicamento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
              <li class="breadcrumb-item active">Actualizar Medicamento</li>
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
          <h3 class="card-title">Editar datos de medicamento</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action=" {{ url('medicamento', $medicamento->COD_MEDICAMENTO) }} " method="post">
          @csrf()
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" name="NOM_MEDICAMENTO" placeholder="Nombre" value="{{ $medicamento->NOM_MEDICAMENTO }}" required />
            </div>
            <div class="form-group">
              <label>Vía de administración</label>
              <textarea class="form-control" name="ADM_MEDICAMENTO" placeholder="Via de administración" cols="30" rows="3" required>{{ $medicamento->ADM_MEDICAMENTO }}</textarea>
            </div>
            <div class="form-group">
              <label>Tratamiento</label>
              <textarea class="form-control" name="TRA_MEDICAMENTO" placeholder="Tratamiento" cols="30" rows="3" required>{{ $medicamento->TRA_MEDICAMENTO }}</textarea>
            </div>
            <div class="form-group">
              <label>Dosis</label>
              <textarea class="form-control" name="DOS_MEDICAMENTO" placeholder="Dosis" cols="30" rows="3" required>{{ $medicamento->DOS_MEDICAMENTO }}</textarea>
            </div>
            <div class="form-group">
              <label>Reorden</label>
              <input class="form-control" name="CAN_REORDEN" placeholder="Reorden" type="number" min="1" value="{{ $medicamento->CAN_REORDEN }}" required />
            </div>


          </div>
          <!-- /.card-body -->

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
      <!-- /.card -->

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