@extends('layouts.app')


                <!-- contenido -->
               

@section('content')
<div class="container-fluid" id="divUsers">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Formulario Único de Certificación de Documentos
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
                @foreach( $usuconfor as $datos)
                <form action="{{route('solicitudesCliente.store')}}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="estructura_id" value="{{ $datos->estructura->id}}">
                <input type="hidden" name="usuConFomulario_id" value="{{ $datos->id}}">
                

                @csrf
                    <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <center><label><strong><h4>Formulario Único de Certificación de Documentos <!-- ID: {{ $datos->id}} --></h4></strong></label></center>
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <!-- seccion nueva formulario -->
                                <!-- <div class="col-xs-12 col-md-3">
                                Número de Certificado
                                    <input type="number" name="numerocertificado" class="form-control">
                                </div> -->
                <label>Marcar la Opción que corresponda</label>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Marcar</th>
                        <th scope="col">Observación</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <th scope="row">Rectificación Certificado </th>
                            <td><input type="checkbox" name="rectCert" value="1"></td>
                            <td></td>
                            
                        </tr> -->
                        <tr>
                            <th scope="row">Control Documental Trabajadores</th>
                            <td><input type="checkbox" name="contdocutrab" value="1"></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Control Documental Empresa </th>
                            <td><input type="checkbox" name="contdocuempr" value="1"></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Evaluación Financiera </th>
                            <td><input type="checkbox" name="evalfina" value="1"></td>
                            <td></td>
                            
                        </tr>
                        <tr>
                            <th scope="row">Otros</th>
                            <td><input type="checkbox" name="otro" value="1"></td>
                            <td><textarea name="otraopcion"></textarea></td>
                            
                        </tr>
                       
                    </tbody>
                </table>
                <!-- fin seccion nueva  -->
                            </div>

                            <div class="col-xs-12 col-md-12">
                                <label><strong><h6>1.- Individualización del Cliente (Contratista o Subcontratista)</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>Rut</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->empresa->rut }} ">
                            </div>
                            
                            <div class="col-xs-12 col-md-10">
                                <label>Razón Social / Nombre (Apellido Paterno Apellido Materno Nombre)</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->empresa->nombre }}">
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>Dirección</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->empresa->direccion }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-4">
                                <label>Comuna</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->empresa->comuna }}">
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->empresa->telefonos }}">
                            </div>

                            <div class="col-xs-12 col-md-12 mt-2 ">
                                <label><strong><h6>2.- Antecedentes de la Empresa Principal, (Información referida al dueño de la empresa, Obra o Faena donde se desarrollan los servicios o ejecutan las obras contratadas. A llenar por el Cliente</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>Rut</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->rut }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-10">
                                <label>Razón Social / Nombre (Apellido Paterno Apellido Materno Nombre)</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->nombre }}">
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>Dirección</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->direccion }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-4">
                                <label>Comuna</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->comuna }}">
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->telefonos }}">
                            </div>
                            <div class="col-xs-12 col-md-12 mt-2 ">
                                <label><strong><h6>Enviar A</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-7">
                                <label>Nombre</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->nomContacto }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-5">
                                <label>Cargo</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="col-xs-12 col-md-7">
                                <label>Email</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->emailContacto }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-5">
                                <label>Telefono</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->proyecto->empresa->fonContacto }}">
                            </div>
                            <div class="col-xs-12 col-md-12 mt-2 ">
                                <label><strong><h6>3.- Antecedentes del Contratista, ( A llenar solo en caso que el solicitante del Certificado sea subcontratista</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>Rut</label>
                                <input type="text" witdth="2" class="form-control">
                            </div>
                            
                            <div class="col-xs-12 col-md-10">
                                <label>Razón Social / Nombre (Apellido Paterno Apellido Materno Nombre)</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>Dirección</label>
                                <input type="text" witdth="2" class="form-control">
                            </div>
                            
                            <div class="col-xs-12 col-md-4">
                                <label>Comuna</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>Teléfono</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-xs-12 col-md-12 mt-2 ">
                                <label><strong><h6>4.- Individualización de la Obra, Empresa o Faena por la cual solicita el Certificado</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <label>Nombre de la Obra, Faena, Empresa</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->proyecto->proyecto }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-3">
                                <label>N° total de Trabajadores a Revisar</label>
                                <input type="number" min=0 name="totalvigentes"  value="0" class="form-control" required placeholder="Valor mínimo es 0">
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>Dirección de la Obra objeto del Certificado</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->proyecto->direccion }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-4">
                                <label>Comuna</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <label>N° Contrato</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->contrato }}">
                            </div>
                            
                            <div class="col-xs-12 col-md-12 mt-2 ">
                                <label><strong><h6>5.- Individualización del Contacto ante SERRESVERIFICADORA SPA</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <label>Nombre</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->empresa->nomContacto }} ">
                            </div>
                            
                            <div class="col-xs-12 col-md-3">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" readonly value="{{ $datos->estructura->empresa->fonContacto }} ">
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <label>Email</label>
                                <input type="text" witdth="2" class="form-control" readonly value="{{ $datos->estructura->empresa->emailContacto }} ">
                            </div>
                            <div class="col-xs-12 col-md-12 mt-2 ">
                                <label><strong><h6>6.- Archivos para Adjuntar</h6></strong></label>
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <label>Planilla Excel con Nómina de Trabajadores</label>
                                <input type="file" name="pla" witdth="2" class="form-control">
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <label>Set de Documentos ( Solo Archivo ZIP)</label>
                                <input type="file" name="set" witdth="2" class="form-control">
                            </div>
                          
                            

                            <!-- fin nuevos -->


                            <div class="col-xs-12 col-md-6 mt-3">
                                <center><input type="submit" value="Enviar Solicitud" class="btn btn-success"></center>
                            </div>
                            <div class="col-xs-12 col-md-6 mt-3">
                                <center><label>
                                <input type="checkbox" name="noenviar" value=1 class="form-control">
                                Marcar para Guardar y no Enviar
                                </label>
                                </center>
                            </div>

                    </div>
                </form>
                @endforeach
                    <!-- fin contenido  -->
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection