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

                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#storeLista">
                                            <i class="icon-cloud-upload"></i> Importar
                                        </button>

                                        <button type="button" class="btn btn-primary float-right" style="margin-right: 10px" data-toggle="modal" data-target="#createLista">
                                            <i class="icon-list"></i> Crear
                                        </button>

                                    </div>
                                </div>


                            </div>
                            <div class="card-body">

                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="">Nombre</th>
                                        <th>Miembros</th>
                                        <th>Acciones</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listas as $lista)
                                        <tr>
                                            <td>
                                                <div>{{ $lista->nombre_lista }}</div>
                                                <div class="small text-muted">
                                                    Registrado: {{ $lista->created_at }}
                                                </div>
                                            </td>
                                            <td class="">
                                                {{ $lista->cantidad}}
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm" title="editar" onclick="editarLista('{{ $lista->nombre_lista }}','{{ $lista->id }}')"  data-toggle="modal" data-target="#editLista"><i class="fa fa-pencil"></i></button>
                                                <a href="{{ route('lista-blanca.limpiar.lista',$lista->id) }}" title="limpiar lista" class="btn btn-danger btn-sm"><i class="icon icon-trash"></i></a>
                                                <a href="{{ route('lista-blanca.validarmx.lista',$lista->id) }}" title="validar MX" class="btn btn-warning btn-sm"><i class="fa fa-search"></i></a>
                                                <a href="{{ route('lista-blanca.descargar.lista',$lista->id) }}" style="color: #fff" title="descargar" class="btn btn-primary btn-sm"><i class="fa fa-download"></i></a>

                                            </td>

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
            {{ $listas->render() }}
        </div>
    </main>
    @include('lista-blanca.create')
    @include('lista-blanca.importar')
    @include('lista-blanca.modal-edit')

    @push('edit-lista')
        <script>
            function editarLista(nombre_lista,id)
            {
                $('#nombre_lista').val(nombre_lista);
                $('#lista_id').val(id);
                console.log(nombre_lista+'/'+id);
            }
        </script>
    @endpush
@endsection