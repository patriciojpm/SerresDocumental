<?php

namespace App\Exports;

use App\solicitudeproceso;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class SolicitudesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct($fechai,$fechaf)
    {
        $this->fechai = $fechai;
        $this->fechaf = $fechaf;
    }



    public function collection()
    {
        
        //dd($this->year);
        return solicitudeproceso::wheredate('created_at',">=",$this->fechai)->wheredate('created_at',"<=",$this->fechaf)->get();
    }
}
