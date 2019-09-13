@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edición de Usuario
                    <span class="float-right">
                        @can('users.create')
                            <a href="{{ route('users.index')}}" class="btn btn-sm btn-primary mr-auto ml-auto">Volver</a>
                        @endcan  
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Contenido formulario funcionando -->
                    {!! Form::model($user, ['route'=>['users.update',$user->id], 'method'=>'PUT']) !!}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- direccion -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección URL DashBoard') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $user->direccion }}">

                               
                            </div>
                        </div>
                        <!-- fin direccion -->

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-2">
                                <input id="password" type="text" readonly class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">password, Minimo 6 Caracteres(Min,May,Num,Simb)</label>
                           <div class="col-md-6">
                                <input type="button" id="btnGetPass" class="btn btn-success" value="Generar Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Password') }}</label>

                            <div class="col-md-2">
                                <input id="password-confirm" type="text" readonly class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                            @if ($user->Tipo=='Admin')
                                <select name="Tipo" class="form-control"  required>
                                    <option value="Admin">Administrador</option>
                                    <option value="cliente">Cliente</option>
                                </select>
                            @else
                                <select name="Tipo" class="form-control"  required>
                                    <option value="cliente">Cliente</option>
                                    <option value="Admin">Administrador</option>
                                </select>
                            @endif

                                @if ($errors->has('Tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="{{ __('Actualizar Usuario') }}">
                                
                            </div>
                        </div>
                        {!! Form::close() !!}
                    



                    <!-- fin contenido  -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection