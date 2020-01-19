@extends('layouts.app')


                <!-- contenido -->
               

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Contratista para Iniciar Solicitudes
                    <span class="float-right">
                        <!-- @can('estructuras.create')
                            <a href="{{ route('estructuras.create')}}" class="btn btn-sm btn-primary mr-auto ml-auto">Asignar Contratistas a Proyectos</a>
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
                                <th>Razón Social Mandante</th>
                                <th>Rut Mandante</th>
                                <th scope="col">Contratista</th>
                                <th scope="col">Contrato</th>
                                <th scope="col">Formulario</th>
                                <!-- <th scope="col">Periodo Inicio</th>
                                <th scope="col">Periodo Fin</th>
                                <th scope="col">Autorizado Solicitud</th> -->
                                <th scope="col">Crear Solicitud con Movimiento</th>
                                <th scope="col">Crear Solicitud sin Movimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($formulacioContratista as $solicitud)
                            @if ($solicitud->activo==1)
                                                                       
                                
                                        
                                    <tr @if ($solicitud->activo==1) style="color:blue" @endif>
                                        <th scope="row">{{ $solicitud->id}}</th>
                                        <th>{{ $solicitud->estructura->proyecto->empresa->nombre}} </th>
                                        <th>{{ $solicitud->estructura->proyecto->empresa->rut}}</th>
                                        <th>{{ $solicitud->estructura->empresa->nombre }}</th>
                                        <th>{{ $solicitud->estructura->contrato }}</th>
                                        <th>
                                        @if ($solicitud->formulario==1)
                                            Certificación
                                        @elseif($solicitud->formulario==2)
                                            Certificación de Documentos
                                        @endif
                                        </th>
                                        <!-- <td>
                                            Día de Inicio {{ $solicitud->periodoInicio}}
                                        </td>
                                        <td>
                                            Último día para certificar {{ $solicitud->periodoFin}}, 
                                        </td>
                                        <td>
                                            @if ($dia>=$solicitud->periodoInicio && $dia <=$solicitud->periodoFin)
                                                Dentro del Plazo
                                            @else
                                                <label @if ($dia>=$solicitud->periodoInicio || $dia <=$solicitud->periodoFin) style="color:red" @endif>Fuera de Plazo</label>
                                            @endif
                                        </td> -->
                                        <th> <center>@can('solicitudesClienteEnviadas.crud')<a href="{{ route('solicitudesCliente.formulario',$solicitud->id)}}" class="btn btn-sm btn-success"><i class="fas fa-file-invoice"></i></a>@endcan</center></th>
                                        <th><center> 
                                            @if($solicitud->estructura->proyecto->empresa->djuradas==1)
                                                @can('solicitudesClienteEnviadas.crud')<a href="{{ route('solicitudesCliente.formularioDeclaracion',$solicitud->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-file-invoice"></i></a>@endcan</center></th>
                                            @endif
                                    </tr>

                                <!-- <td>  </td> -->
                            @endif
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