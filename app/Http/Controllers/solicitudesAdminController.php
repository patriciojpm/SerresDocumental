<?php

namespace App\Http\Controllers;
use App\solicitudeproceso;
use App\usuconfomulario;
use App\user;
use App\usuconformulario;
use App\seguimiento;
use App\solicituddocumento;
use App\Exports\SolicitudesExport;
use Illuminate\Http\Request;
use Alert;
use Maatwebsite\Excel\Facades\Excel;

class solicitudesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $tipo="Admin";
    public $enviada="Enviada";
    public $liberada="Liberada";
    public $aprobada="Aprobada";
    public $comentario;
    public function index()
    {
        
        $solicitudes=solicitudeproceso::where('inspector_id',NULL)->where('estado',$this->enviada)->get();
       
        
        return view('Admin.solicitudesNuevas',compact('solicitudes'));
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
        foreach($solicitud as $usuconformid){
            $this->usuconform_id = $usuconformid->usuconformulario_id;
        }

        $usufor=usuconformulario::where('id',$this->usuconform_id)->get();
       
        foreach($usufor as $formulario){
            $this->tipoFormulario = $formulario->formulario;
        }

      

        $inspectores=user::where('Tipo',$this->tipo)->get();
        $solicitud=solicitudeproceso::where('id',$id)->get();
        $documentos=solicituddocumento::where('solicitudeproceso_id',$id)->get();

            if ($this->tipoFormulario==1){
                    return view('Admin.edicionAsignacionSolicitud',compact('solicitud','inspectores','documentos'));
            }elseif($this->tipoFormulario==2){
                return view('Admin.edicionAsignacionSolicitudDocumentos',compact('solicitud','inspectores','documentos'));
            }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user = auth()->User()->id;
         //bitacora de asignada
         if($request->estado=='Asignada'){
             $this->comentario="Solicitud Asignada"."- Observación: ".$request->observaciones;
             seguimiento::create([
                 'solicitudeproceso_id'=>$id,
                 'comentario'=>$this->comentario,
                 'user_id'=>$user,
                 'inspector_id'=>$user,
                 ]);
         }
         // fin bitacora
          //bitacora de asignada
          if($request->estado=='Rechazada'){
            $this->comentario="Solicitud Observada"."- Observación: ".$request->observaciones;
            seguimiento::create([
                'solicitudeproceso_id'=>$id,
                'comentario'=>$this->comentario,
                'user_id'=>$user,
                'inspector_id'=>$user,
                ]);
        }
        // fin bitacora
        
        
        //$id->update($request->all());
        $act=solicitudeproceso::where('id',$id)->update(['inspector_id'=>$request->inspector_id,'estado'=>$request->estado,'observaciones'=>$request->observaciones]);

        $solicitudes=solicitudeproceso::where('inspector_id',NULL)->where('estado','Enviada')->get();
        Alert::success('Solicitud Procesada Correctamente');
        return view('Admin.solicitudesNuevas',compact('solicitudes'));
        
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

    public function Aprobar(){
        $solicitudes=solicitudeproceso::where('certificado','!=',0)->where('estado',$this->aprobada)->get();
       
        return view('Admin.solicitudesxAprobar',compact('solicitudes'));
    }

    public function ApruebaCertificado($id){
         //bitacora de Reenvío por rechazo
        
         $this->comentario="Aprobada";
         seguimiento::create([
             'solicitudeproceso_id'=>$id,
             'comentario'=>$this->comentario,
             'user_id'=>1,
             'inspector_id'=>1,
             ]);
         // fin bitacora
        $act=solicitudeproceso::where('id',$id)->update(['estado'=>$this->liberada]);
        return;
    }

    public function Liberadas(){

      
        $this->estado="Liberada";
        $solicitudesNuevas=solicitudeproceso::where('estado',$this->estado)->get();

        return view('Admin.solicitudesFinalizadasLiberadas',compact('solicitudesNuevas'));
    }

    public function ccolpxfechasForm(){
        return view('Admin.ccolpxfechas');
    }

    public function ccolpxfechasReporte(request $request){

        $users=user::where('Tipo',$this->tipo)->get();
       $solicitudes=solicitudeproceso::wheredate('created_at',">=",$request->fechai)->wheredate('created_at',"<=",$request->fechaf)->get();
        return view('Admin.ccolpExcel',compact('solicitudes','users'));
        //return (new SolicitudesExport($request->fechai,$request->fechaf))->download('invoices.xlsx');
    }
}
