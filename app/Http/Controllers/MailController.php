<?php

namespace App\Http\Controllers;

use App\Data;
use App\Newsletter;
use App\Mail\QuoteEmail;
use App\Mail\ContactMail;
use App\Mail\WorkWithUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contact(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'mensaje'    => 'required',
            'email'     => 'required|email:rfc,dns',
        ],[
            'nombre.required'               => 'Nombre y apellido es requerido',
            'mensaje.required'              => 'Mensaje es requerido',
            'email.required'                => 'Correo es requerido',
            'email.email'                   => 'Correo debe tener un formato valido',
        ]);

        $email = Data::first()->email;
        $data = $request->all();

        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'custom');
            
        try {
            Mail::to($email)  
                ->send(new ContactMail($data));
            
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }

    public function workWithUs(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'email'     => 'required|email:rfc,dns',
            'file'      => 'required'
        ],[
            'nombre.required'   => 'Nombre y apellido es requerido',
            'email.required'    => 'Correo es requerido',
            'email.email'       => 'Correo debe tener un formato valido',
            'file.required'     => 'Archivo es requerido'            
        ]);

        $email = Data::first()->email;
        $data = $request->all();

        if($request->hasFile('file'))
            $data['image'] = $request->file('file')->store('file_email', 'custom');
            
        try {
            Mail::to($email)  
                ->send(new WorkWithUsMail($data));
            
            $mensaje = 'Correo enviado, nuestro equipo se pondra en contacto con usted';
            $class = 'success';

        } catch (\Throwable $th) {
            $mensaje = 'Error al enviar correo';
            $class = 'danger';
            Log::error($th->getMessage());
        }

        return back()
            ->with('mensaje', $mensaje)
            ->with('class', $class);
    }
}