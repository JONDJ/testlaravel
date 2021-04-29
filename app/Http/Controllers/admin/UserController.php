<?php
/*
    Author: Jonathan Ortega
    Date: 28-04-2021
    Comment: Controlador Usuarios Admin
*/
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        $title='Users';
        $order_list = 'desc';
        $query = User::select('id','name','birth_date','email','document','cell_phone');
        if($request->has('search') && trim($request->search) != '')
           $query->orWhere('name','like',"%$request->search%") 
                ->orWhere('email','like',"%$request->search%")
                ->orWhere('cell_phone','like',"%$request->search%")
                ->orWhere('document','like',"%$request->search%");
        if(isset($_GET['order'])){
            if($_GET['order'] == 'desc'){
                $order_list='asc'; 
            }else {
                $order_list='desc'; 
            }  
        }else {
            $order_list='asc';
        }

        if(isset($_GET['sort'])){
            $by=$_GET['sort'];
        }else {
            $by='id';
        }
        $list = $query->orderBy($by,$order_list)->paginate($request->limit ?? 5);
        return view('admin.user',compact('list','title','order_list'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|unique:users,email',
            'name'      => 'required|between:2,10',
            'cell_phone'=> 'between:10,10',
            'password'  => 'required|min:6',
            'document'  => 'required|max:11',
            'birth_date'=> 'required|before:-18 years',
            'city_id'   => 'required|numeric',
        ]);
        User::create($request->all());
        return back()->withInput();
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'id'     => 'required',
            'name'      => 'required|between:2,10',
            'cell_phone'=> 'between:10,10',
            'birth_date'=> 'required|before:-18 years',
            'city_id'   => 'required|numeric',
        ]);
        User::find($request->id)->update($request->except(['email','document']));
        return back()->withInput();
    }
    public function delete(Request $request){
        $this->validate($request, [
            'id'     => 'required',
        ]);
        $user = User::find($request->id);
        $user->delete();
        return back();
    }
}