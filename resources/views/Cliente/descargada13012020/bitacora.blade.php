@extends('layouts.app')


                <!-- contenido -->
               

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @foreach($seguimiento as $bitacoraid)
                <?php $id = $bitacoraid->solicitudeproceso_id ?>
            @endforeach
            @foreach($solicitud as $estado)
                <?php $estado = $estado->estado ?>
            @endforeach
                <div class="card-header">Bitácora Solicitud N° <strong> {{$id }} </strong>, Estado: <strong> 
                @if ($estado=="Guardada")
                                        INICIADA
                                    
                                    @elseif ($estado=="Enviada")
                                        RECIBIDO
                                    @elseif($estado=="Asignada")
                                        EN REVISION
                                        @elseif($estado=="Rechazada")
                                        CON OBSERVACIONES
                                    @elseif($estado=="Liberada")
                                        APROBADA
                                
                                    @endif   
               
            
            
            </strong>
                                    <!-- <span class="float-right">
                        @can('estructuras.create')
                            <a href="{{ route('estructuras.create')}}" class="btn btn-sm btn-primary mr-auto ml-auto">Asignar Contratistas a Proyectos</a>
                        @endcan  
                    </span> -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Contenido -->
                    <table class="table">
                        <thead>
                            <tr>
                            <!-- <th scope="col">ID</th> -->
                            <th scope="col">Fecha Creación</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Comentario / Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($seguimiento as $bitacora)
                            <tr>
                                <!-- <th scope="row">{{ $bitacora->id }}</th> -->
                                <td>{{ $bitacora->created_at }}</td>
                                <td>{{ $bitacora->user->name}}</td>
                                <td>{{ $bitacora->comentario }}</td>
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