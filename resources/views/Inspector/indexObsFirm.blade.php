@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Solicitudes Obseravdas y Enviadas a Firma
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
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Rut Contratista</th>
                                <th scope="col">Contratista</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">N° Contrato</th>
                                <th scope="col">Fecha Recepción</th>
                                <th scope="col">Tipo de Solcitud</th>
                                <th scope="col">Periodo a Certificar</th>
                                <th scope="col">Estado</th>
                                
                                <th scope="col">Bitácora</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($solicitudesNuevas as $solicitud)
                            <tr>
                                <th scope="row">{{ $solicitud->id}}</th>
                                <th scope="row">{{ $solicitud->estructura->empresa->rut}}</th>
                                <th scope="row">{{ $solicitud->estructura->empresa->nombre}}</th>
                                <th scope="row">{{ $solicitud->estructura->proyecto->proyecto}}</th>
                                <th scope="row">{{ $solicitud->estructura->contrato}}</th>
                                <th scope="row">{{ $solicitud->fechaEnvio}}</th>
                                <th>
                                @if($solicitud->usuconformulario->formulario==1)
                                    Certificación
                                @else
                                    No Disponible
                                @endif
                                </th>  
                                <th scope="row">{{ $solicitud->mes}}-{{ $solicitud->ano}}</th> 
                                <th scope="row">
                                @if ($solicitud->estado=="Guardada")
                                        INICIADA
                                    
                                    @elseif ($solicitud->estado=="Enviada")
                                        RECIBIDO
                                    @elseif($solicitud->estado=="Asignada")
                                        EN REVISION
                                        @elseif($solicitud->estado=="Rechazada")
                                        CON OBSERVACIONES
                                    @elseif($solicitud->estado=="Liberada")
                                        APROBADA
                                        @elseif($solicitud->estado=="Aprobada")
                                        ENVIADA A FIRMA
                                
                                    @endif
                                </th>
                              
                                <th>
                                        <center><a href="{{ route('bitacora.index',$solicitud->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-clipboard-list"></i></a></center>
                                    </th>
                              
                                                                      
                                </td>
                           
                            </tr>
                        @endforeach    
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          
                        </tfoot>
                    </table>
                    <!-- fin contenido  -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection