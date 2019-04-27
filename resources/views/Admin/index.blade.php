@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Usuarios del Sistema
                    <span class="float-right">
                        @can('users.create')
                            <a href="{{ route('users.create')}}" class="btn btn-sm btn-primary mr-auto ml-auto">Crear Usuario</a>
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
                            <th scope="col">Nombre Usuario</th>
                            <!-- <th scope="col">Correo Electrónico</th>
                            <th scope="col">Tipo de Usuario</th> -->
                            <th scope="col">Ver</th>
                            <th scope="col">Editar</th>
                            <th scope="col"><center>Eliminar</center></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id}}</th>
                                <td>{{ $user->name }}</td>
                                <!-- <td>{{ $user->email }}</td>
                                <td>{{ $user->Tipo }}</td> -->
                                <td> @can('users.show')<a href="{{ route('users.show',$user->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>@endcan</td>
                                <td> @can('users.edit')<a href="{{ route('users.edit',$user->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>@endcan</td>
                                <td>@can('users.destroy')

                                <button onclick="EliminarUser($user->id)">Click me</button>
                                <!-- {!! Form::open(['route'=>['users.destroy',$user->id], 'method'=>'DELETE']) !!}
                                @csrf
                                    {{ form::submit('<i class="far fa-trash-alt"></i>',['class'=>'btn btn-sm btn-primary'])}}
                                    
                                
                                {!! Form::close() !!}@endcan -->
                                <!-- <center><a href="{{route('users.destroy',$user->id)}}"> <i class="far fa-trash-alt"></i></button></a><center>
                                <center><a href="" onclick="EliminarUser($user->id)"> <i class="far fa-trash-alt"></i></button></a><center> -->
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
@include('sweet::alert')

@endsection
