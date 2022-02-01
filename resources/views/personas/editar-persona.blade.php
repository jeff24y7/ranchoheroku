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
                <h1>Editar personas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="principal-admin">Principal</a></li>
                    <li class="breadcrumb-item active">Personas</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Editar persona</h3>
        </div>
        @foreach( $personas as $persona)
        <form action="{{url('personas', $persona->COD_PERSONA)}}" method="post">
            @csrf()
            @method('PUT')



            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Código Persona</label>
                            <input type="text" name="COD_PERSONA" class="form-control" id="COD_PERSONA" disabled value="{{$persona->COD_PERSONA}}">
                        </div>
                        <div class="form-group">
                            <label>Estado Civil</label>
                            <select name="IND_PERSONA" id="IND_PERSONA" class="custom-select" value="{{$persona->IND_PERSONA}}">
                                <option>SOLTERO</option>
                                <option>CASADO</option>
                                <option>VIUDO</option>
                                <option>DIVORCIADO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Detalle de la Dirección</label>
                            <textarea name="DET_DIRECCION" id="DET_DIRECCION" rows="3" class="form-control">{{$persona->DET_DIRECCION}}</textarea>
                        </div>

                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Dirección de correo electrónico</label>
                            <input type="text" name="DIR_CORREO" class="form-control" id="DIR_CORREO" value="{{$persona->DIR_CORREO}}" />
                        </div>

                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Número de Área</label>
                            <input class="form-control" name="NUM_AREA" value="{{$persona->NUM_AREA}}" required />
                        </div>
                        <div class="form-group">
                            <label>Número de teléfono fijo</label>
                            <input type="text" name="NUM_CELULAR" class="form-control" id="NUM_CELULAR" value="{{$persona->NUM_CELULAR}}" />
                        </div>
                        <div class="form-group">
                            <label>Estado Comercial</label>
                            <input type="text" name="IND_PERSONA_ESTADO" class="form-control" id="IND_PERSONA_ESTADO" value="{{$persona->IND_PERSONA_SISTEMA}}" />
                        </div>
                    </div>
                </div>
                <div class="card-footer" background="color#f5f;">
                    <div class="row">
                        <div class="col-6" style="color: #f5f;">
                            <button class="btn btn-default btn-block " did="" data-toggle="modal" data-target="#Cancelar" data-dismiss="modal">Cancelar</button>
                        </div>
                        <div class="col-6">
                            <button class="btn  btn-primary btn-success" type="submit" data-toggle="modal">Editar Persona <i class="fas   mr-2" data-toggle="modal"></i></button>
                        </div><br></br>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
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
