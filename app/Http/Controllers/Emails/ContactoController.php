<?php

namespace App\Http\Controllers\Emails;

use App\Http\Controllers\Controller;
use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormularioContacto(){
        return view('correos.formcontacto');
    }
    
    public function procesarFormularioContacto(Request $request){
        $datos=$request->validate(self::rules());
        $datos['email']=Auth::user() ? Auth::user()->email : $datos['email'];
        try{
            Mail::to('soporte@mitio.com')->send(new ContactoMailable($datos));
            return redirect()->route('inicio')->with('mensaje', 'Correo enviado, gracias por sus sugerencias');
        }catch(\Exception $ex){
            dd($ex->getMessage());
            //return redirect()->route('inicio')->with('mensaje', 'No se pudo enviar el mensaje, intentelo más tarde');
        }
    }

    private static function rules(): array{
        $rules=[
            'nombre'=>['required', 'string', 'min:5', 'max:100'],
            'comentario'=>['required', 'string', 'min:10', 'max:500'],
        ];
        if(Auth::guest()){
            $rules['email']=['required', 'email', 'max:250'];
        }
        return $rules;
    }
}
