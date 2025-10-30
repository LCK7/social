<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //metodo STORE
    public function store()
    {
        //Reglas de validacion para indicar que campos deben ser requeridos
        //Lo que implica -> ¿Que campos si o si NO deben ser registrados vacios?
        request()->validate(['body' => 'required | min:10']);

        $status = Status::create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        //Dar como respuesta de confimracion el contenido del registro creado
        return response()->json(['body' => $status->body]);
    }
}
