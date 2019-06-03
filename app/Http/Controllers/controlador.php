<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\session;
use DB;

class controlador extends Controller
{

    public function registro(Request $Request){
        $validar = \Validator::make($Request->all(),['Usuario' =>'required','Nombre' =>'required','Contraseña' =>'required']);

        if($validar -> fails()){
            return redirect() -> back() -> withErrors($validar -> errors());
        }else{
            $usuario=$Request->input('Usuario');
            $nombre=$Request->input('Nombre');
            $password=$Request->input('Contraseña');
            $rol=null;

            if ($Request->input('Rol') == "Administrador") {
                $rol="Administrador";
            }else{
                $rol="Invitado"; 
            }

            $rsp = DB::table('usuario')->insert([
                        
                'usuario'   => $usuario,
                'nombre' => $nombre,
                'contraseña' => $password,
                'rol' => $rol,
               ]);

               if($rol == "Administrador"){

                $users = DB::table('usuario')
                    ->join('puntajes', 'usuario.idpuntajes', '=', 'puntajes.idpuntajes')
                    ->select('usuario.idusuario', 'usuario.usuario', 'usuario.nombre', 'usuario.rol','puntajes.puntaje')
                    ->get();

                session::put('nombre',$usuario);
                session::put('users',$users);
                return view('administrador',compact('usuario','users')); 

               }else if($rol=="Invitado"){
               

                DB::table('puntajes')->insert([
                        
                    'puntaje' => 0
                    ]);
                    
                $uusuario = DB::table('usuario')->max('idusuario');
                $upuntaje = DB::table('puntajes')->max('idpuntajes');

                DB::table('usuario')
                ->where('idusuario', $uusuario)
                ->update(['idpuntajes' =>$upuntaje]);
                
                $rsp = DB::table('usuario')->where(['idusuario'=>$uusuario])->get();

                $id=0;

                foreach($rsp as $datos){
                   $id=$datos->idpuntajes;
                }
               
               $puntajes = DB::table('puntajes')
                ->select('puntaje')
                ->where('idpuntajes', '=', $id)
                ->get(); 


                session::put('nombre',$usuario);
                   session::put('punto',$puntajes);
                   return view('inicio_invitado',compact('usuario','puntajes'));
               }
               
        }
    }

    public function login(Request $request){

        $validar = \Validator::make($request->all(),['Usuario' =>'required','Contraseña' =>'required']);

        if($validar -> fails()){
            return redirect() -> back() -> withErrors($validar -> errors());
        }else{
            $usuario=$request->input('Usuario');
            $password=$request->input('Contraseña');
            $rol=null;

            if ($request->input('Rol') == "Administrador") {
                $rol="Administrador";

                $rsp = DB::table('usuario')->where(['usuario'=>$usuario,'contraseña'=>$password,'rol'=>$rol])->get();
                if(count($rsp)>0){

                    $users = DB::table('usuario')
                    ->join('puntajes', 'usuario.idpuntajes', '=', 'puntajes.idpuntajes')
                    ->select('usuario.idusuario', 'usuario.usuario', 'usuario.nombre', 'usuario.rol','puntajes.puntaje')
                    ->get();
                    session::put('nombre',$usuario);
                    return view('administrador',compact('users','usuario'));
                }else{
                    return redirect() -> back();
                }

            }else{
                $rol="Invitado";

                $rsp = DB::table('usuario')->where(['usuario'=>$usuario,'contraseña'=>$password,'rol'=>$rol])->get();
                if(count($rsp)>0){

                     $id=0;

                     foreach($rsp as $datos){
                        $id=$datos->idpuntajes;
                     }
                    
                    $puntajes = DB::table('puntajes')
                     ->select('puntaje')
                     ->where('idpuntajes', '=', $id)
                     ->get(); 

                     

                   session::put('nombre',$usuario);
                   session::put('punto',$puntajes);
                   return view('inicio_invitado',compact('usuario','puntajes'));
                }else{
                    return redirect() -> back();
                }
                
            }

            
        }
    }

    

    public function comienza(Request $request){
        $usuario=session::get('nombre');
        session::put('nombre',$usuario);
        return view('test1',compact('usuario'));
    }

    public function china(Request $request){
        $puntos=0;
        if ($request->input('china') == "China") {
            $puntos+=33;
        }
        $usuario=session::get('nombre');
        session::put('nombre',$usuario);
        session::put('puntaje',$puntos);
	     return view('test2',compact('puntos','usuario'));
    }

    public function roma(Request $request){
        $puntos=0;
        if ($request->input('roma') == "I") {
            $puntos+=33;
        }
        $suma=session::get('puntaje');
        $suma+=$puntos;
        $usuario=session::get('nombre');
        session::put('nombre',$usuario);
        session::put('puntaje',$suma);
	     return view('test3',compact('suma','usuario'));
    }

    public function cristo(Request $request){
        $puntos=0;
        if ($request->input('jesus') == "Brasil") {
            $puntos+=33;
        }
        $usuario=session::get('nombre');
        $suma=session::get('puntaje');
        session::put('nombre',$usuario);
        $punto_final=$puntos+$suma;

        $punto = DB::table('puntajes')->insert(['puntaje' => $punto_final]);

        $price = DB::table('puntajes')->max('idpuntajes');

        DB::table('usuario')
            ->where('usuario', $usuario)
            ->update(['idpuntajes' => $price]);
            
        return view('felicidades',compact('punto_final','usuario'));
    }

    public function volver(Request $Request){
        $usuario=session::get('nombre');

        $rsp = DB::table('usuario')->where(['usuario'=>$usuario])->get();
        $id=0;

        foreach($rsp as $datos){
           $id=$datos->idpuntajes;
        }
       
       $puntajes = DB::table('puntajes')
        ->select('puntaje')
        ->where('idpuntajes', '=', $id)
        ->get(); 

        return view('inicio_invitado',compact('usuario','puntajes'));
        
    }
    public function update($idusuario){

         DB::table('usuario')->where('idusuario',$idusuario)->delete();
         $usuario= session::get('nombre');
         $users = DB::table('usuario')
                    ->join('puntajes', 'usuario.idpuntajes', '=', 'puntajes.idpuntajes')
                    ->select('usuario.idusuario', 'usuario.usuario', 'usuario.nombre', 'usuario.rol','puntajes.puntaje')
                    ->get();
         return view('administrador',compact('users','usuario'));

    }

}
