<?php
/*
    Author: Jonathan Ortega
    Date: 28-04-2021
    Comment: Controlador Api consulta de emails
*/
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Email;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }
    public function index(Request $request)
    {
        $query = Email::select('subject','emails.email as destinatario');
        if($request->has('remitente')){
            $query->join('users','users.id','emails.user_id')
                ->where('users.email',$request->remitente);
        }
        if($request->has('destinatario')){
            $query->where('emails.email',$request->destinatario);
        }
        if($request->has('asunto')){
            $query->where('subject',$request->asunto);
        }
        $emails = $query->get();
        return response()->json($emails);
    }
}