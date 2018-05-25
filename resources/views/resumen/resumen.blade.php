@extends('layouts.master')
@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn" href="#">
                        <i class="icon-speech"></i>
                    </a>
                    <a class="btn" href="./">
                        <i class="icon-graph"></i>  Dashboard</a>
                    <a class="btn" href="#">
                        <i class="icon-settings"></i>  Settings</a>
                </div>
            </li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-5">
                                        Log de carga subida
                                    </div>
                                    <div class="col-sm-7 d-none d-md-block">
                                        {{--<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#storeLista">--}}
                                            {{--<i class="icon-cloud-upload"></i> Importar--}}
                                        {{--</button>--}}
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Total : {{ $total }} ,Se Subio {{ $contador_valido }} registros y {{ $invalido }} fallaron y {{ $duplicados }} duplicados.
                                            <a href="{{ route('descargar.invalidos') }}">descargar errores</a> y
                                            <a href="{{ route('eliminar.invalido') }}">limpiar</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>

        </div>
    </main>
@endsection