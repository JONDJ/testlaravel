<?php
/*
    Author: Jonathan Ortega
    Date: 28-04-2021
    Comment: Controlador Api consulta de usuarios
*/
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }
    public function index(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }
}