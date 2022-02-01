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
                    <h3 class="card-title">Editar datos de la transferencia</h3>
                </div>
                @foreach($transespermas as $transesperma)
                <form action="{{url('transesperma', $transesperma->COD_TRANS_ESPERMA)}}" method="post" role="form">
                    @csrf()
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>CÓDIGO TRANSFERENCIA </label>
                                    <input name="COD_TRANS_ESPERMA" value="{{$transesperma->COD_TRANS_ESPERMA}}" placeholder="" id="COD_TRANS_ESPERMA" class="form-control" type="text" disabled> <br />
                                </div>
                                <div class="form-group">
                                    <label>Estado de la transferencia</label>
                                    <select name="IND_TRANS_ESPERMA" class="form-control" id="IND_TRANS_ESPERMA" value="{{$transesperma->IND_FECUNDACION}}">
                                        <option value="" selected disabled>Seleccione el estado de la transferencia</option>

                                        <option>FECUNDÓ</option>
                                        <option>NO FECUNDÓ</option>
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