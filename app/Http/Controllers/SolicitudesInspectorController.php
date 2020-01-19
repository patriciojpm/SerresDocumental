<?php

namespace App\Http\Controllers;
use App\solicitudeproceso;
use App\user;
use App\seguimiento;
use App\solicituddocumento;
use Mail;
use App\Mail\NotificacionSolicitudObservada;
use Illuminate\Http\Request;
use Alert;
class SolicitudesInspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    Public $estado="Asignada";
    Public $observadas="Rechazada";
    public $aprobada="Aprobada";
    public $declaracion="Declaracion";
    public $mail;

    public function index()
    {
        $user = auth()->User()->id;
        $seguimiento=seguimiento::all();
        $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->Orwhere('inspector_id',$user)->where('estado',$this->declaracion)->get();
        
        return view('Inspector.index',compact('solicitudesNuevas','seguimiento'));
    }

    public function SolicitudesInspectorObsFirm()
    {
        $user = auth()->User()->id;
        if ($user==1 || $user==1669){
            $solicitudesNuevas=solicitudeproceso::where('estado',$this->observadas)->Orwhere('estado',$this->aprobada)->get();
        }else{

            $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->observadas)->Orwhere('estado',$this->aprobada)->where('inspector_id',$user)->get();
        }
        
        return view('Inspector.indexObsFirm',compact('solicitudesNuevas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $seguimiento=seguimiento::all();
        $solicitud=solicitudeproceso::where('id',$id)->get();
        $documentos=solicituddocumento::where('solicitudeproceso_id',$id)->get();
        return view('Inspector.editSolicitud',compact('solicitud','documentos','seguimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->User()->id;
        
        if($request->certificado!=0){
            //bitacora de Reenvío por rechazo
            $this->comentario="Solicitud Enviada a Firma";

            if ($request->observaciones!=""){

                seguimiento::create([
                'solicitudeproceso_id'=>$id,
                'comentario'=>$this->comentario." - Observación: ".$request->observaciones,
                'user_id'=>$user,
                'inspector_id'=>$user,
                ]);
             }else{ 
            seguimiento::create([
                'solicitudeproceso_id'=>$id,
                'comentario'=>$this->comentario,
                'user_id'=>$user,
                'inspector_id'=>$user,
                ]);
             }  
            // fin bitacora


            $this->estado="Aprobada";
            $seguimiento=seguimiento::all();
            $act=solicitudeproceso::where('id',$id)->update(['estado'=>$this->estado,'observaciones'=>$request->observaciones,'certificado'=>$request->certificado]);
            Alert::success('Solicitud Enviada a Firma');
            $user = auth()->User()->id;
            $this->estado="Asignada";
            $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->get();
            return view('Inspector.index',compact('solicitudesNuevas','seguimiento'));
             
        }
        if($request->estado=="Rechazada"){

              //bitacora de Reenvío por rechazo
              $this->comentario="Solicitud Observada por Inspector";
              seguimiento::create([
                  'solicitudeproceso_id'=>$id,
                  'comentario'=>$this->comentario." - ".$request->observaciones,
                  'user_id'=>$user,
                  'inspector_id'=>$user,
                  ]);
              // fin bitacora


              $seguimiento=seguimiento::all();
            $this->estado="Rechazada";
            $act=solicitudeproceso::where('id',$id)->update(['estado'=>$request->estado,'observaciones'=>$request->observaciones]);
            Alert::info('Solicitud Observada...');
            $solicitud = solicitudeproceso::where('id',$id)->get();
            foreach($solicitud as $usuario_id){
                $usuario=user::where('id',$usuario_id->user_id)->get();
                    foreach($usuario as $mail_usuario){
                        $this->mail=$mail_usuario->email;
                    }
            }

            Mail::to($this->mail)->send(new NotificacionSolicitudObservada($id));

            $user = auth()->User()->id;
            $this->estado="Asignada";
            $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->get();
            return view('Inspector.index',compact('solicitudesNuevas','seguimiento'));
            

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function finalizadas(){

        $user = auth()->User()->id;
        $this->estado="Liberada";
        $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->get();

        return view('Inspector.solicitudesFinalizadas',compact('solicitudesNuevas'));
    }

    
}
