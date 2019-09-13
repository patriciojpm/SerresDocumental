@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Empresas con sus Proyectos
                    <span class="float-right">
                        @can('proyectos.create')
                            <a href="{{ route('proyectos.create')}}" class="btn btn-sm btn-primary mr-auto ml-auto">Crear Proyecto a Empresa Mandante</a>
                        @endcan  
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
                            <th scope="col">Rut</th>
                            <th scope="col">Nombre</th>
                            
                            <th scope="col">Ver</th>
                            <th scope="col">Editar</th>
                            <!-- <th scope="col"><center>Eliminar</center></th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($empresas as $empresa)
                            <tr>
                                <th scope="row">{{ $empresa->id}}</th>
                                <td>{{ $empresa->rut }}</td>
                                <td>{{ $empresa->nombre }}</td>
                              
                                
                                <td> @can('proyectos.show')<a href="{{ route('proyectos.show',$empresa->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>@endcan</td>
                                <td> @can('proyectos.edit')<a href="{{ route('proyectos.edit',$empresa->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>@endcan</td>
                                <td>@can('proyectos.destroy')
                                
                               
                                
                                @endcan                                
                                </td>
                                <!-- <td>  </td> -->
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