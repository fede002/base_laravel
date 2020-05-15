<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicios\srvMedico;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class loginController extends Controller
{
    public function login(Request $rq)
    {
        //cerrar sesion
        return view('sitio/login');
    }

    public function logout(Request $rq)
    {
        //cerrar sesion
        Session::put("afiliado", "");
        Session::put("datos", "");
        Session::put("datos_cab", "");
        Session::put("usuario", null);
        //\App\Helpers\miPrint::logEnArchivos("\n\n" . "se limpio la cab y items", "sigue_curl");
        return redirect()->route('padron.ingreso');
    }

    public function validaUsuario(Request $rq)
    {
        $usu =  strtoupper($rq->input('txUsuario'));
        $pass =  ($rq->input("txPassword"));
        $pass =  base64_encode($rq->input("txPassword"));
        $usuario =  "";
        if (!empty($usu)) {

            //TODO: implementar
            //$srv = \App\Servicios\srvMedico::valUsuario($usu, $pass);

            $srv = new \App\Models\medico();
            $srv->med_id = 1;
            $srv->med_firmaimg = "";
            $srv->med_tipo = "";
            $srv->med_cuit = "";
            $srv->med_apellido = "";
            $srv->med_nombre = "";

            //dd($srv);
            //$srv = \App\Servicios\srvMedico::consultar($usu);
            /*$srv = ["med_id" => 1, "med_firmaimg" => "", 
                    "med_cuit" => "111111111", 
                    "med_nombre" => "nombre pru",
                    "med_apellido" => "apellido pru"];
            **/
            $usuario = $srv;
        }

        if (!empty($usuario)) {
            //cargo la session            
            Session::put("usuario", $usuario);
            return redirect()->route('padron.inicio');
        } else {
            $resul = ["tipo" => "danger", "mensaje" => "No se identificó al usuario"];
            return back()->with("mensaje", $resul);
        }
    }

    public function inicio(Request $rq)
    {
        return view('home');
    }

    public function registro(Request $rq)
    {
        return view('frmRegistraUsu');
    }

    public function registroUsuario(Request $rq)
    {
        request()->validate([
            'fpImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $med =  new \App\Models\medico;
        $med->med_cuit =  strtoupper($rq->input('txUsuario'));
        $passBase64 =  base64_encode($rq->input("txPass"));
        $med->med_password = $passBase64;
        $med->med_apellido = $rq->input('txApe');
        $med->med_nombre = $rq->input('txNom');
        $med->med_matricula = $rq->input('txMat');
        $med->med_db_origen = 0;
        $med->med_db_origen_cod = 0;
        $med->med_tipo = $rq->input('cbTipoMed');

        $imagen = $rq->file('fpImagen');
        $name_firma = "public/firma/" . $med->med_cuit;
        $name = Storage::put($name_firma, $imagen);
        $med->med_firmaimg = $name;

        //TODO: implementar
        //$resultado = srvMedico::registrarMedico($med);
        $resultado = true;

        if (!empty($resultado)) {
            //cargo la session            
            //Session::put("usuario", $usuario);
            $resul = ["tipo" => "success", "mensaje" => "Se registró al usuario correctamente!"];
            return back()->with("mensaje", $resul);
        } else {
            $resul = ["tipo" => "danger", "mensaje" => "Error al registrar al usuario!"];
            return back()->with("mensaje", $resul);
        }
    }

    public function configUsu(Request $rq)
    {
        return view('frmConfigUsu');
    }

    public function actualizaUsuario(Request $rq)
    {

        request()->validate([
            'fpImagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $med = Session::get("usuario");

        $passBase64 =  base64_encode($rq->input("txPass"));
        $med->med_password = $passBase64;

        $imagen = $rq->file('fpImagen');
        if (empty($imagen)) {
            //$resul = ["tipo" => "danger", "mensaje" => "Debe subir la imagen de la firma!"];
            //return back()->with("mensaje", $resul);
        } else {
            $imagen = $rq->file('fpImagen');
            $name_firma = "public/firma/" . $med->med_cuit;
            $name =  Storage::put($name_firma, $imagen);
            //$imagenBase64 = base64_encode( file_get_contents($imagen->getRealPath()));
            //$med->med_firmaimg = $imagenBase64;
            $med->med_firmaimg = $name;
        }
        //TOMO: implementar
        //$resultado = srvMedico::registrarMedico($med);
        $resultado = true;
        if ($resultado["error"] == "") {
            Session::put("usuario", $med);
            $resul = ["tipo" => "success", "mensaje" => "Se actualizaron los datos correctamente"];
        } else {
            $resul = ["tipo" => "danger", "mensaje" => $resultado["error"]];
        }
        return back()->with("mensaje", $resul);
    }
}
