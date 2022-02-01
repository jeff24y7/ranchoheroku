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
                        <h1>Editar vaca preñada por esperma</h1>
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
                    <h3 class="card-title">Editar datos de la transferencia</h3>
                </div>
                @foreach($vacasprenadasesperma as $vacaprenadaesperma)
                <form action="{{url('prenadas_esperma', $vacaprenadaesperma->COD_PRENADA_ESPERMA)}}" method="post" role="form">
                    @csrf()
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>CÓDIGO VACA PREÑADA</label>
                                    <input name="COD_VACA_PRENADA" value="{{$vacaprenadaesperma->COD_PRENADA_ESPERMA}}" placeholder="" id="COD_VACA_PRENADA" class="form-control" type="text" disabled> <br />
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Número de Pajilla</label>
                                    <input name="COD_EMBRION" value="{{$vacaprenadaesperma->NUM_PAJILLA}}" placeholder="" id="COD_EMBRION" class="form-control" type="text" disabled> <br />
                                </div>
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>FECHA PARIÓ</label>
                                    <input name="FEC_PARIR" placeholder="" class="form-control" type="date" required>
                                </div>
                                <div class="form-group">
                                    <label>OBSERVACIÓN</label>
                                    <input class="form-control" id="OBS_VACAP" name="OBS_VACAP" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label>Estado de la vaca</label>
                                    <select name="IND_PRENADA" class="form-control" id="IND_PRENADA">
                                        <option value="" selected disabled>Seleccione el estado de la transferencia</option>
                                        <option>ABORTÓ</option>
                                        <option>NO ABORTÓ</option>
                                    </select>

                                </div>
                            </div>
                            <div class="card-footer" background="color#f5f;">
                                <div class="row">
                                    <div class="col-6" style="color: #f5f;">
                                        <button class="btn btn-default btn-block " did="" data-toggle="modal" data-target="#Cancelar" data-dismiss="modal">Cancelar</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn  btn-primary btn-success" type="submit">Editar Transferencia <i class="fas   mr-2" data-toggle="modal"></i></button>
                                    </div><br></br>
                                </div>

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