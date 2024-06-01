<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class Crudcontroller extends Controller
{
    public function index(){
        $datos = DB::select("select * from servicios_tecnicos.cliente");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request){
       try {
        $sql=DB::insert("insert into cliente(id_cliente,nombre,apellido,telefono,email)values(?,?,?,?,?)",[
            $request->txtcliente,
            $request->txtnombre,
            $request->txtapellido,
            $request->txttelefono,
            $request->txtemail,
       ]);
       } catch (\Throwable $th) {
        $sql = 0;
       }
       if ($sql == true) {
          return back()->with("Correcto","Cliente registrado correctamente");
       } else {
        return back()->with("Incorrecto","Error al registrar");
        
       }
       

    }

    public function update(Request $request){
        try {
         $sql=DB::update("update cliente set nombre=?, set apellido=? , set telefono=? , set email=? where id_cliente=?",[
             $request->txtnombre,
             $request->txtapellido,
             $request->txttelefono,
             $request->txtemail,
        ]);
        if($sql == 0){
            $sql = 1;
        }
        } catch (\Throwable $th) {
         $sql = 0;
        }
        if ($sql == true) {
           return back()->with("Correcto","Cliente modificado correctamente");
        } else {
         return back()->with("Incorrecto","Error al modificar");
         
        }
        
 
     }

     public function delete($id){
        try {
            $sql=DB::delete("delete from cliente where id_cliente=$id ");
           } catch (\Throwable $th) {
            $sql = 0;
           }
           if ($sql == true) {
              return back()->with("Correcto","Cliente eliminado correctamente");
           } else {
            return back()->with("Incorrecto","Error al eliminar");
            
           }

     }
}
