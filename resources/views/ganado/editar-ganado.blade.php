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
                        <h1>Editar ganado</h1>
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
                    <h3 class="card-title">Editar datos del ganado</h3>
                </div>
                @foreach( $ganados as $ganado)
                <form action="{{url('ganado', $ganado->COD_REGISTRO_GANADO)}}" method="post" role="form">
                    @csrf()
                    @method('PUT')

                    <div class="modal-header">
                        <h3>Editar Ganado</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>CÓDIGO REGISTRO GANADO</label>
                                    <input name="COD_GANADO" placeholder="" id="COD_GANADO" class="form-control" type="text" value="{{$ganado->COD_REGISTRO_GANADO}}"> <br />
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>NÚMERO DE ARETE</label>
                                    <input name="NUM_ARETE" placeholder="" id="NUM_ARETE" value="{{$ganado->NUM_ARETE}}" class="form-control" type="text"> <br />
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>NOMBRE </label>
                                    <input name="NOM_GANADO" placeholder="" id="NUM_ARETE" value="{{$ganado->NOM_GANADO}}" class="form-control" type="text"> <br />
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>COLOR</label>
                                    <input name="CLR_GANADO" placeholder="" id="CLR_GANADO" value="{{$ganado->CLR_GANADO}}" class="form-control" type="text"> <br />
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>ESTADO:</label>
                                    <select name="COD_ESTADO" class="form-control">
                                        <option value="" selected disabled>{{$ganado->DET_ESTADO}}</option>

                                        <option value="1">PREÑADA</option>
                                        <option value="2">PARIDA</option>
                                        <option value="3">SECA</option>
                                        <option value="4">SINCRONIZADA</option>
                                        <option value="5">MUERTA</option>
                                        <option value="6">MAMANDO</option>
                                        <option value="7">DESTETADO</option>
                                        <option value="8">VENDIDO</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>LUGAR:</label>
                                    <select name="COD_LUGAR" id="COD_LUGAR" class="form-control">
                                        <option value="" selected disabled>{{$ganado->DIR_LUGAR}}</option>
                                        <option value="1">AGUJAS</option>
                                        <option value="2">BACADILLAS</option>
                                        <option value="3">QUEBRADA</option>

                                    </select>
                                </div>
                                <div class="form-group">

                                    <label><span style="color: red;"></span>PESO (kg):</label>
                                    <input name="PES_ACTUAL" placeholder="" id="PES_ACTUAL" value="{{$ganado->PES_ACTUAL}}" class="form-control" type="text"> <br />
                                </div>
                                <div class="form-group">

                                    <label><span style="color: red;"></span>FIERRO</label>
                                    <input name="FIE_GANADO" placeholder="" id="FIE_GANADO" value="{{$ganado->FIE_GANADO}}" class="form-control" type="text"> <br />
                                </div>

                                <div class="form-group">

                                    <label><span style="color: red;"></span>RAZA</label>
                                    <input name="RAZ_GANADO" placeholder="" value="{{$ganado->RAZ_GANADO}}" id="PES_ACTUAL" class="form-control" type="text"> <br />
                                </div>

                            </div>
                        </div>
                        <div class="card-footer" background="color#f5f;">
                            <div class="row">
                                <div class="col-6" style="color: #f5f;">
                                    <button class="btn btn-default btn-block " did="" data-toggle="modal" data-target="#Cancelar" data-dismiss="modal">Cancelar</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn  btn-primary btn-success" type="submit" data-toggle="modal" data-target="#RegistrarPersona">Editar Transferencia <i class="fas   mr-2" data-toggle="modal"></i></button>
                                </div><br></br>
                            </div>
                        </div>
                    </div>

                </form>
                @endforeach
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