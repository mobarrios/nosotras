<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Entities\Configs\User;
use App\Entities\Admin\Consultas;

use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{

    public function index()
    {
        $this->data['section'] = 'home';
        $this->data['activeBread'] = '';
       // $this->data['config'] = (object)['sectionName'=>'Home', 'indexRoute'=>'home'];
       // 
       
       $this->data['usuarios_registrados'] = User::all()->count();
       $this->data['total_consultas'] = Consultas::all()->count();

       $this->data['consultas_tipo'] = DB::table('consultas')
       ->join('consultas_tipo','consultas_tipo.id','=','consultas.tipo_consulta')
       ->select('consultas_tipo.name',DB::raw('count(*) as consultas'))
       ->groupBy('consultas.tipo_consulta')
       ->get();



        return view('home')->with($this->data);
    }

}
