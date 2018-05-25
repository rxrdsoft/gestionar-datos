@extends('layouts.master')
@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            {{--<li class="breadcrumb-item">Home</li>--}}
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
                                        Todos los suscriptores
                                    </div>
                                    <div class="col-sm-7 d-none d-md-block">
                                        <div class="row">
                                            <div class="col-sm-7">

                                                <div class="input-group">
                                                    <select name="" id="group_id" class="form-control">
                                                        <?php $cont1 = 1; ?>
                                                        <?php $cont2 = 500000; ?>
                                                        <option selected disabled>--- Selecionar opcion ---</option>
                                                        @for($i= 0 ; $i< $total/500000; $i++)
                                                        <option value="{{$cont2}}">{{ $cont1 }} - {{ $cont2 }}</option>
                                                                <?php $cont1 = $cont1 + 500000 ; ?>
                                                                <?php $cont2 = $cont2 + 500000; ?>
                                                         @endfor
                                                    </select>
                                                    <div class="input-group-prepend">
                                                        <button  class="btn btn-primary exportar">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#storeLista">
                                                    <i class="icon-cloud-upload"></i> Importar
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4" style="padding-left: 30px;margin-left: 15px;">
                                        <div class="dropdown show">
                                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               Listas Negras
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @foreach($categorias as $categoria)
                                                <a class="dropdown-item lista_negra" href="#" data-id="{{ $categoria->id }}">{{ $categoria->nombre }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.row-->
                                <br/>
                                <table style="width: 100%;"  class="table  table-hover table-outline mb-0" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            {{--<th>ID</th>--}}
                                            <th>Nombre</th>
                                            <th class="text-center">Apellido</th>
                                            <th>Email</th>
                                            <th class="text-center">SMS</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>
            {{--{{ $lista_blanca->render() }}--}}
        </div>
        <input type="hidden" id="mover" name="mover[]">
    </main>
    @include('lista-blanca.importar')
    @push('descargar-todos')
        <script>
            $(document).ready( function () {
                var table = $('#myTable').DataTable({

                    "ajax": 'http://localhost/emkt/public/lista-blanca-json',
                    "dataSrc": "",
                    "columns": [
                        { "data": "nombre" },
                        { "data": "apellido" },
                        { "data": "email" },
                        { "data": "sms" },

                    ],
                    "language": {
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "search": "Buscar:",
                        "paginate": {
                            "first":      "Primero",
                            "last":       "Ultimo",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        },
                        "zeroRecords":  "No se encontraron registros coincidentes",
                        "infoFiltered":   "(filtrado de _MAX_ registros totales)",
                    },

                });



                var array = [];
                $('#myTable tbody').on( 'click', 'tr', function () {
                    $(this).toggleClass('selected');
                    array = [];
                     // console.log(table.rows('.selected').data());

                    table.rows('.selected').every(function(rowIdx) {
                        array.push({
                            'id' : table.row(rowIdx).data().id,
                            'email' :table.row(rowIdx).data().email
                        })
                    });
                      // console.log(array);


                } );

                $('.lista_negra').click( function () {
                    // console.log($(this).data('id'))
                    var contador = table.rows('.selected').data().length;
                    for(var i=0; i< contador;i++){
                        table.row('.selected').remove().draw( false );
                        // console.log(table.rows('.selected').data().length);
                        // console.log('id tr'+i)
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.post('http://localhost/emkt/public/mover/suscriptores',{
                        data:array,
                        categoria :$(this).data('id')
                    },function(result){
                        console.log('se envio con exito');
                        console.log(result)
                    })

                } );
            } );
        </script>
        <script>
            $('.exportar').click(function(){
                id = $('#group_id').val();

                if(id == null)
                {
                    console.log(id)
                }else{
                    window.location.href = `{{URL::to('lista-blanca/lista/descargar-partes/${id}')}}`
                }

            })
        </script>
    @endpush
@endsection