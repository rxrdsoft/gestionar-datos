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
                                        Todos Lista
                                    </div>
                                    <div class="col-sm-7 d-none d-md-block">
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#primaryModal">
                                            <i class="icon-cloud-upload"></i> Importar
                                        </button>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">

                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>

                                        <th>Nombre</th>
                                        <th class="text-center">Miembros</th>
                                        {{--<th>Acciones</th>--}}

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categorias as $key => $value)
                                    <tr>
                                        <td>
                                            <div>{{ $value->nombre }}</div>
                                            <div class="small text-muted">
                                                Registrado: {{ $value->created_at }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $contador[$key] }}
                                        </td>
                                        {{--<td>--}}
                                            {{--<button class="btn btn-primary">Ver</button>--}}
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

        </div>
    </main>
    @include('lista-negra.importar')
@endsection