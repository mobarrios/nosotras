<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

// use App\Http\Repositories\Admin\EscuelasRepo;
// use App\Http\Repositories\Admin\MesasRepo;
// use App\Http\Repositories\Admin\OperativosRepo;
 
 use App\Http\Repositories\Admin\SitesRepo;

use Illuminate\Routing\Route;
// use App\Entities\Admin\Votos;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Entities\Configs\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Entities\Admin\Imgs;

use App\Entities\Admin\SitesTipo;
use App\Entities\Admin\ConsultasTipo;
use App\Entities\Admin\Consultas;
use Illuminate\Http\Request;

use Mail;



class ApiController extends Controller
{
    public function getSites(SitesRepo $sitesRepo)
    {
        $res = $sitesRepo->getModel()->all();

        return response()->json(['results'=>$res],200);
   
    }

    public function getSitesTipo()
    {
        $res =  SitesTipo::all();

        return response()->json(['results'=>$res],200);
    }

    public function getConsultasTipo()
    {
        $res =  ConsultasTipo::all();

        return response()->json(['results'=>$res],200);
    }

    public function postConsulta(Route $route,Request $request)
    {
        $tipo = $request->get('tipo');
        $text = $request->get('text');
        $user = $request->get('user_id');



        $con = new Consultas();
        $con->descripcion = $text;
        $con->tipo_consulta = $tipo;
        $con->solicitud_user_id = $user;
        $con->estado = 1;
        $con->save();


        return response()->json('true');
    }

  public function getConsultas(Route $route, Request $request)
    {
        $tipo = $route->getParameter('tipo');
        $user = $request->get('user_id');
        
        $con =  Consultas::with('ConsultasTipo')->where('solicitud_user_id',$user)->get();
        
        return response()->json(['results'=>$con],200);
    }


  public function postLogin(Request $request)
  {
      $user = $request->get('user');
      $pass = $request->get('pass');

      $user =  User::where('user_name',$user)->first();


      if(isset($user) > 0)
      { 
        if(Hash::check($pass, $user->password))

          if($user->confirmed == true)
          {
              $check = $user->id;
          
          }else{
            
              $check = false;
          }


        else
            $check = false;
      }else{

        $check = false;
      }
     
        return response()->json(['results'=> $check],200);
  }


  public function register(Request $request)
  {

      $name = $request->get('name');
      $last_name = $request->get('last_name');
      $pass = $request->get('pass');
      $email = $request->get('email');

      $u = new User();
      $u->user_name = $email;
      $u->name = $name;
      $u->last_name = $last_name;
      $u->email = $email;
      $u->password = $pass;
      $u->save();


        Mail::send('confirm', ['id' => $u->id ], function ($m) use ($u) {
            $m->from('nosotras@sysmo.com.ar', 'Nos.Otras');
            $m->to($u->email, $u->name)->subject('Confirmación de la cuenta.');
        });


      return response()->json(['results' => true] ,200);
  }

 public function confirm(Route $route)
  {

      $id = $route->getParameter('id');
     

      $u =  User::find($id);
      $u->confirmed = 1;
      $u->save();


        // Mail::send('confirm', ['user' => $u], function ($m) use ($u) {
        //     $m->from('nosotras@sysmo.com.ar', 'Nos.Otras');
        //     $m->to($u->email, $u->name)->subject('Confirmación de la cuenta.');
        // });


      return 'Cuenta Confirmada!!';
  }


   //  public function getMesasByUsers(Route $route)
   //  {   
   //      //$res = User::with('Mesas')->with('Mesas.Escuelas')->with('Mesas.Escuelas.Operativos')->where('user_name', $route->getParameter('user_name'))->first();

   //      $res = DB::table('users')
   //      ->join('operativos_mesas_users','operativos_mesas_users.users_id','=','users.id')
   //      ->join('mesas','mesas.id','=','operativos_mesas_users.mesas_id')
   //      ->join('escuelas','escuelas.id','=','mesas.escuelas_id')
   //      ->join('operativos','operativos.id','=','operativos_mesas_users.operativos_id')
   //      ->join('niveles_operativos','niveles_operativos.id','=','operativos.niveles_operativos_id')
   //      ->where('users.user_name','=',$route->getParameter('user_name'))
   //      ->select('operativos.id as operativos_id',
   //          'operativos.nombre as operativos_nombre',
   //          'mesas.id as mesas_id',
   //          'mesas.numero as mesas_numero',
   //          'escuelas.id as escuelas_id',
   //          'escuelas.nombre as escuelas_nombre',
   //          'niveles_operativos.id as niveles_operativos_id',
   //          'niveles_operativos.nombre as niveles_operativos_nombre'
   //      )
   //      ->get();


   //    return response()->json(['results'=>$res],200);
   //  }

   //  public function getUsers(Route $route)
   //  {


   //      if (Auth::once(['user_name' => $route->getParameter('user_name'), 'password' => $route->getParameter('password')]))
   //      {
   //              $user = User::find(Auth::id());
   //              $user->remember_token = Str::random(60);
   //              $user->save();

   //          return response()->json($user,200);
        
   //      }else{

   //          return response()->json(false,401);
   //      }
   //  }

   //  public function getOperativos(Route $route,OperativosRepo $operativosRepo)
   //  {
   //      $userId = $route->getParameter('userId');

   //      // $res =  $operativosRepo->getModel()
   //      // ->with('Escuelas')
   //      // ->with('Escuelas.Mesas')
   //      // ->with('Listas')
   //      // ->with('Listas.Partidos')
   //      // ->with('Listas.Partidos.Images')
   //      // ->with('Listas.TipoOperativos')
   //      // ->with('Escuelas.Mesas.User')
   //      // // ->whereHas('Escuelas.Mesas.User',function($q) use ($userId) {
   //      // //     $q->where('users_id',$userId);
   //      // // })
   //      // ->get();   
   //      // 
   //      $res = DB::table('users')
   //      ->join('operativos_mesas_users','operativos_mesas_users.users_id','=','users.id')
   //      ->join('mesas','mesas.id','=','operativos_mesas_users.mesas_id')
   //      ->join('escuelas','escuelas.id','=','mesas.escuelas_id')
   //      ->join('operativos','operativos.id','=','operativos_mesas_users.operativos_id')
   //      ->join('niveles_operativos','niveles_operativos.id','=','operativos.niveles_operativos_id')
   //      ->where('users.id','=',$route->getParameter('userId'))
   //      ->select('operativos.id as operativos_id',
   //          'operativos.nombre as operativos_nombre',
   //          'mesas.id as mesas_id',
   //          'mesas.numero as mesas_numero',
   //          'escuelas.id as escuelas_id',
   //          'escuelas.nombre as escuelas_nombre',
   //          'niveles_operativos.id as niveles_operativos_id',
   //          'niveles_operativos.nombre as niveles_operativos_nombre'
   //      )
   //      ->get();


        
   //      return response()->json(['results'=>$res],200);
   //  }

   //  // public function getUsers()
   //  // {
   //  //     $res = collect();


   //  // $res->push([
   //  //     'nombre'=>'pepe',
   //  //     'apellido'=>'argento',
   //  //     'email' => 'mno@das.dcom'
   //  // ]);
   //  // $res->push([
   //  //     'nombre'=>'Juan',
   //  //     'apellido'=>'Perez',
   //  //     'email' => '1231@das.dcom'
   //  // ]);



        
   //  //     return response()->json(['results'=>$res],200);

   //  // }

   //  public function getEscuelas()
   //  {
   //     $res =  'dasdsds';
    
   //     return response()->json(['results'=>$res],200);
   //  } 

   //  public function getMesas( MesasRepo $mesasRepo, Route $route)
   //  {

   //     $res =  $mesasRepo->getModel()->with('Escuelas')->with('Escuelas.Operativos')->with('Escuelas.Operativos.Candidatos')->find($route->getParameter('id'));
    
   //     return response()->json(['results'=>$res],200);
   //  } 

   //  public function getCandidatos( OperativosRepo $operativosRepo, Route $route)
   //  {
   //     $res =  $operativosRepo->getModel()->with('Candidatos')->with('Candidatos.Partidos')->find($route->getParameter('id'));
    
   //     return response()->json(['results'=>$res],200);
   //  } 

   //   public function getListas( OperativosRepo $operativosRepo, Route $route)
   //  {
   //     $res =  $operativosRepo->getModel()->with('Listas')->with('Listas.Partidos')->with('Listas.Partidos.Images')->with('Listas.TipoOperativos')
   //     ->whereHas('Listas',function($q){
   //      $q->orderBy('tipo_operativos_id','ASC');
   //     })->find($route->getParameter('id'));

   //     return response()->json(['results'=>$res],200);
   //  } 


   //  public function postVotos(Route $route)
   //  {
   //      $votos = new Votos();

   //      $cantVotos = $route->getParameter('cantVotos');
   //      $idOperativos = $route->getParameter('idOperativos');
   //      $idMesas = $route->getParameter('idMesas');
   //      $idListas = $route->getParameter('idListas');

   //      $cantVotosRecurridos = $route->getParameter('total_recurridos');
   //      $cantVotosNulos = $route->getParameter('total_nulos');
   //      $cantVotosImpugnados = $route->getParameter('total_impugnados');
   //      $cantVotosBlancos = $route->getParameter('total_blancos');


   //      $cantVotosRecurridos1 = $route->getParameter('total_recurridos1');
   //      $cantVotosNulos1 = $route->getParameter('total_nulos1');
   //      $cantVotosImpugnados1= $route->getParameter('total_impugnados1');
   //      $cantVotosBlancos1 = $route->getParameter('total_blancos1');
   //      // $url = $route->getParameter('url');

   //      $votos->total = $cantVotos;
   //      $votos->operativos_id = $idOperativos;
   //      $votos->listas_id = $idListas;
   //      $votos->mesas_id = $idMesas;

   //      $votos->total_blancos = $cantVotosBlancos;
   //      $votos->total_impugnados = $cantVotosImpugnados;
   //      $votos->total_nulos = $cantVotosNulos;
   //      $votos->total_recurridos = $cantVotosRecurridos;


   //      $votos->total_blancos1 = $cantVotosBlancos1;
   //      $votos->total_impugnados1 = $cantVotosImpugnados1;
   //      $votos->total_nulos1 = $cantVotosNulos1;
   //      $votos->total_recurridos1 = $cantVotosRecurridos1;

   //          // $img = new Imgs;
   //          // $img->operativos_id = $idOperativos;
   //          // $img->mesas_id = $idMesas;
   //          // $img->img = $url;
   //          // $img->save();
         

   //      $votos->save();

   //     return response()->json(true,200);
   //  }

   //  public function postUrl(Route $route)
   // {
    
   //      $img = new Imgs();
   //      $img->operativos_id = $route->getParameter('idOperativos');
   //      $img->mesas_id = $route->getParameter('idMesas');
   //      $img->img =  $route->getParameter('imagen');
   //      $img->save();


   //   return response()->json(true,200);

   // }

   // public function postImagen(Route $route)
   // {
    
   //  return response()->json(true,200);

   //  //     $img = new Imgs;
   //  //     $img->operativos_id = $route->getParameter('idOperativos');
   //  //     $img->mesas_id = $route->getParameter('idMesas');
   //  //     $img->img =  $route->getParameter('imagen');
   //  //     $img->save();


   //  // return response()->json(true,200);

   // }

}