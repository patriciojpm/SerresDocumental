@extends('layouts.app')

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Solicitudes 
                    <span class="float-right">
                        <!-- @can('usuconforms.create')
                            <a href="{{ route('usuconforms.create')}}" class="btn btn-sm btn-primary mr-auto ml-auto">Asignar Contratistas a Usuarios para Administrar Solicitudes</a>
                        @endcan   -->
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- Contenido -->
                    <table class="table" id="tablaProyectos">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Razón Social Mandante</th>
                                <th scope="col">Rut Mandante</th>
                                <th scope="col">Rut Contratista  </th>
                                <th scope="col">Contratista</th>
                                <th scope="col">Tipo de Solcitud</th>
                                <th scope="col">Periodo a Certificar</th>
                                <!-- <th scope="col">Ingresos del Periodo</th> -->
                                <th scope="col">Fecha Recepción</th>
                                <th scope="col">Desvinculados de otras causales del Periodo</th>
                                <th scope="col">N° total de Trabajadores vigentes en Obra</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Contrato</th>
                                <th scope="col">Certificado</th>
                                <th scope="col">Bitácora</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitudesAdmin as $solicitud)
                            <tr>
                                <th scope="row">{{ $solicitud[0]}}</th>
                                <th scope="row">{{ $solicitud[14]}}</th>
                                
                                <th scope="row">{{ $solicitud[15]}}</th>
                                <th>
                                {{ $solicitud[12]}}
                                </th>
                                <th>
                                {{ $solicitud[13]}}
                                </th>
                                @if($solicitud[11]=="1")
                                    <th scope="row">Certificación Laboral</th>
                                @else
                                    <th scope="row">Certificación Documental {{$solicitud[11]}}</th>
                                @endif
                                <th scope="row">{{ $solicitud[1]}}-{{ $solicitud[2]}}</th>
                                <!-- <th scope="row">{{ $solicitud[3]}}</th> -->
                                <th scope="row">{{ $solicitud[17]}}</th>
                                <th scope="row">{{ $solicitud[4]}}</th>
                                <th scope="row">{{ $solicitud[6]}}</th>
                                <!-- @if($solicitud[7]=="Aprobada")
                                    <th scope="row">Asignada</th>
                                @else
                                    <th scope="row">{{ $solicitud[7]}}</th>
                                @endif -->
                                <th scope="row">
                                    <!-- {{$solicitud[7]}} -->
                                @if ($solicitud[7]=="Guardada")
                                        INICIADA
                                    
                                    @elseif ($solicitud[7]=="Enviada")
                                        RECIBIDO
                                    @elseif($solicitud[7]=="Asignada")
                                        EN REVISION
                                    @elseif($solicitud[7]=="Rechazada")
                                        CON OBSERVACIONES
                                    @elseif($solicitud[7]=="Liberada")
                                        CERTIFICADO
                                    @elseif($solicitud[7]=="Aprobado")
                                        PROCESO DE FIRMA
                                
                                    @endif
                                    </th>
                                <th scope="row">{{ $solicitud[10]}}</th>
                                <th scope="row">
                                @if($solicitud[7]=="Liberada")
                                        <a href="<?php echo 'http://www.serresverificadora.cl/administrador/generador_certificado.php?ncert='. $solicitud[16] ?>" target="_blank">Certificado</a>
                                    @endif

                                </th>
                                <th>
                                <center><a href="{{ route('bitacora.index',$solicitud[0])}}" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i></a></center>
                                </th>
                               
                                

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    <!-- fin contenido  -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection