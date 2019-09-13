@extends('layouts.app')

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Solicitudes Enviadas y Observadas
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Rut Contratista  </th>
                            <th scope="col">Contratista</th>
                            <th scope="col">Tipo de Solcitud</th>
                            <th scope="col">Periodo a Certificar</th>
                            <th scope="col">Ingresos del Periodo</th>
                            <th scope="col">Art. 161 del Periodo</th>
                            <th scope="col">Desvinculados de otras causales del Periodo</th>
                            <th scope="col">N° total de Trabajadores vigentes en Obra</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Contrato</th>
                            <th scope="col">Bitácora</th>
                            <th scope="col">Acción</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($solicitudesEnviadas as $solicitud)
                            <tr>
                                <th scope="row">{{ $solicitud->id}}</th>
                                <th scope="row">{{ $solicitud->estructura->empresa->rut}}</th>
                                <th scope="row">{{ $solicitud->estructura->empresa->nombre}}</th>
                                <th>
                                @if($solicitud->usuconformulario->formulario==1)
                                    Certificación
                                @elseif($solicitud->usuconformulario->formulario==2)
                                    Certificación de Documentos
                                @endif
                                </th>  
                                <th scope="row">{{ $solicitud->mes}} / {{ $solicitud->ano}}</th> 
                                <th scope="row">{{ $solicitud->contratados}}</th>
                                <th scope="row">{{ $solicitud->desvinculados}}</th>
                                <th scope="row">{{ $solicitud->otrascausas}}</th>
                                <th scope="row">{{ $solicitud->totalvigentes}}</th>
                                @if($solicitud->estado=="Aprobada")
                                    <th scope="row">Asignada</th>
                                @else
                                    <th scope="row">{{ $solicitud->estado}}</th>
                                @endif

                                <th scope="row">{{ $solicitud->estructura->contrato}}</th>
                                <th>
                                    <center><a href="{{ route('bitacora.index',$solicitud->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i></a></center>
                                </th>
                                <th scope="row">
                                   
                                    @if($solicitud->estado=="Rechazada")
                                    <div class="col-xs-12 col-md-4">
                                        @can('solicitudesClienteEnviadas.crud')<a href="{{ route('solicitudesCliente.edit',$solicitud->id)}}" class="btn btn-sm btn-success"><i class="fas fa-user-check"></i></a>@endcan
                                    </div>
                                    @endif
                                
                                
                                
                                </th>
                              
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                    <!-- fin contenido  -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection