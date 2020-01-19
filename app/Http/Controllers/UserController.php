<?php

namespace App\Http\Controllers;
use App\User;
use caffeinated\Shinobi\Models\role_user;
use Mail;
use App\Mail\EmergencyCallReceived;
use Alert;
use App\usuconformulario;
use caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\form_create_users_request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function __construct()
    {
       
        
    }
    
    public $dato;
    public $matrizUsuario=array();
    public $f=0;
    public $c=0;
    public $si="SI";
    public $no="NO";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

    //     foreach($users as $usuario){
    //         $buscar=usuconformulario::where('user_id',$usuario->id)->get();
    //         foreach($buscar as $usu){
    //             $this->dato=$usu->id;
    //         }
    //             if (empty($this->dato))
    //             {
    //                 $this->matrizUsuario[$this->f][$this->c]=$usuario->id;
    //                 $this->matrizUsuario[$this->f][$this->c+1]=$usuario->name;
    //                 $this->matrizUsuario[$this->f][$this->c+2]=$this->si;
    //                 $this->f++;
    //             }else{
    //                 $this->matrizUsuario[$this->f][$this->c]=$usuario->id;
    //                 $this->matrizUsuario[$this->f][$this->c+1]=$usuario->name;
    //                 $this->matrizUsuario[$this->f][$this->c+2]=$this->no;
    //                 $this->f++;
    //             }
    //     }


    //    dd($this->matrizUsuario);
        return view('Admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::get();
        return view('Admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(form_create_users_request $request)
    {
        // $user = User::create($request->all());
        $save=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            // 'rut' => $request['rut'],
            'direccion' => $request['direccion'],
            'Tipo' => $request['Tipo'],
            ]);
            
            $clave=$request['password'];
            
            Mail::to($request['email'])->send(new EmergencyCallReceived($clave));

        $save->roles()->sync($request->get('roles'));

        Alert::success('Usuario Guardado Correctamente');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $act=User::where('id',$user->id)->update(['password'=>Hash::make($request['password']),'email'=>$request->email,'Tipo'=>$request->Tipo,'direccion'=>$request->direccion,'name'=>$request->name]);
        Alert::success('Datos Actualizados Correctamente');
        return redirect()->route('users.edit', $user->id)->with('info','actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
                $borrar=User::where('id',$id)->delete();
               
         
        

            // 
            // return Response::json($busq);
       
    }

    // public function grabarUser(request $request){
    //     dd($request);
    // }

    public function passwordnueva(){
        
        return view('Cliente.passwordNueva');
    }

    public function nuevaPassword(request $request){

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
         $valor = substr(str_shuffle($permitted_chars), 1, 8);
        $act=User::where('email',$request->correoP)->update(['password'=>Hash::make($valor)]);
        Mail::to($request->correoP)->send(new EmergencyCallReceived($valor));
        
        
        Alert::success('CLAVE DE ACCESO ENVIADA CORRECTAMENTE');
        return view('auth.login');
    }
}
