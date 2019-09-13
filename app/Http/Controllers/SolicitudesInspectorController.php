<?php

namespace App\Http\Controllers;
use App\solicitudeproceso;
use App\user;
use App\seguimiento;
use App\solicituddocumento;
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
    public function index()
    {
        $user = auth()->User()->id;
        $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->get();
        
        return view('Inspector.index',compact('solicitudesNuevas'));
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
        
       
        $solicitud=solicitudeproceso::where('id',$id)->get();
        $documentos=solicituddocumento::where('solicitudeproceso_id',$id)->get();
        return view('Inspector.editSolicitud',compact('solicitud','documentos'));
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
            seguimiento::create([
                'solicitudeproceso_id'=>$id,
                'comentario'=>$this->comentario." - Observación: ".$request->observaciones,
                'user_id'=>$user,
                'inspector_id'=>$user,
                ]);
            // fin bitacora


            $this->estado="Aprobada";
           
            $act=solicitudeproceso::where('id',$id)->update(['estado'=>$this->estado,'observaciones'=>$request->observaciones,'certificado'=>$request->certificado]);
            Alert::success('Solicitud Enviada a Firma');
            $user = auth()->User()->id;
            $this->estado="Asignada";
            $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->get();
            return view('Inspector.index',compact('solicitudesNuevas'));

           
            
        }
        if($request->estado=="Rechazada"){

              //bitacora de Reenvío por rechazo
              $this->comentario="Solicitud Observada por Inspector";
              seguimiento::create([
                  'solicitudeproceso_id'=>$id,
                  'comentario'=>$this->comentario." - Observación: ".$request->observaciones,
                  'user_id'=>$user,
                  'inspector_id'=>$user,
                  ]);
              // fin bitacora



            $this->estado="Rechazada";
            $act=solicitudeproceso::where('id',$id)->update(['estado'=>$request->estado,'observaciones'=>$request->observaciones]);
            Alert::info('Solicitud Rechazada...');
            $user = auth()->User()->id;
            $this->estado="Asignada";
            $solicitudesNuevas=solicitudeproceso::where('inspector_id',$user)->where('estado',$this->estado)->get();
            return view('Inspector.index',compact('solicitudesNuevas'));
            

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
