@extends('layouts.master')
@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"></li>
            {{--<li class="breadcrumb-item">--}}
                {{--<a href="#">Admin</a>--}}
            {{--</li>--}}
            {{--<li class="breadcrumb-item active">Dashboard</li>--}}
            {{--<!-- Breadcrumb Menu-->--}}
            {{--<li class="breadcrumb-menu d-md-down-none">--}}
                {{--<div class="btn-group" role="group" aria-label="Button group">--}}
                    {{--<a class="btn" href="#">--}}
                        {{--<i class="icon-speech"></i>--}}
                    {{--</a>--}}
                    {{--<a class="btn" href="./">--}}
                        {{--<i class="icon-graph"></i>  Dashboard</a>--}}
                    {{--<a class="btn" href="#">--}}
                        {{--<i class="icon-settings"></i>  Settings</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-5">
                                        Todos la lista negra
                                    </div>
                                    <div class="col-sm-7 d-none d-md-block">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#primaryModal">
                                            <i class="icon-cloud-upload"></i> Importar
                                        </button>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            @foreach($categorias as $key => $value)
                                            <div class="col-sm-2">
                                                <div class="callout callout-info">
                                                    <small class="text-muted">{{ $value->nombre }}</small>
                                                    <br>
                                                    <strong class="h4">{{ $contador[$key] }}</strong>
                                                    <div class="chart-wrapper">
                                                        <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--/.row-->
                                        <hr class="mt-0">

                                    </div>
                                    <!--/.col-->

                                    <!--/.col-->
                                </div>
                                <!--/.row-->
                                <br/>
                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            <i class="icon-people"></i>
                                        </th>
                                        <th>Email</th>
                                        <th class="text-center">Categoria</th>
                                        {{--<th>Acciones</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lista_negra as $ln)
                                    <tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="{{ asset('img/avatars/1.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
                                                <span class="avatar-status badge-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>{{ $ln->email }}</div>
                                            <div class="small text-muted">
                                                Registrado: {{ $ln->created_at }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $ln->nombre }}
                                        </td>
                                        {{--<td class="text-center">--}}
                                            {{--<i class="fa fa-cc-mastercard" style="font-size:24px"></i>--}}
                                        {{--</td>--}}
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>
        {{ $lista_negra->render() }}
        </div>
    </main>
@include('lista-negra.importar')


@endsection