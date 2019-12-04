<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\EmpresasImport;
use Alert;
class cargaMasivaController extends Controller
{
    public function cargamasivausuarios(){
        return view('Admin.cargamasivausuarios');
    }

    public function importUser(Request $requestTrabajador){
        
       
            Excel::import(new UsersImport, $requestTrabajador->excel);
            
                
        
        Alert::success('Usuarios Cargados');
        return view('Admin.cargamasivausuarios');
        
    }

    public function cargamasivaempresas(){
        return view('Admin.cargamasivaempresas');
    }

    public function importEmpresas(Request $requestEmpresa){

        Excel::import(new EmpresasImport, $requestEmpresa->excel);

        Alert::success('Empresas Cargados');
        return view('Admin.cargamasivaempresas');
    }
}