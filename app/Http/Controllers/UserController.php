<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
        //<dad>.<child>.<child2>
    }
    public function list_user()
    {
    	$users = DB::table('users')->get();
    	return view('admin.users.list_user',['users'=>$users]);
    }
    public function get_add_user()
    {
    	return view('admin.users.add_user');
    }
    public function add_user(Request $request)
    {
    	$name = $request->name;
    	$email = $request->email;
    	$pass = $request->pass;
    	$pass2 = $request->pass2;
    	if ($pass != $pass2) return redirect('add_user')->with('error','Password and Re-Password do not match!'); 
    	$password = Hash::make($pass);
    	try{
    		DB::table('users')->insert(['name' => $name, 'email' => $email, 'password' => $password]
    		);
    	}catch(QueryException $e){
    		return redirect('list_user')->with('error','Email exists! Create User Failer.');
    	}
    	return redirect('list_user')->with('status', 'Create User Sucess!');
    }
    public function get_modify_user($id){
    	$user = DB::table('users')->where('id','=',$id)->get();
    	return view('admin.users.modify_user',['user'=>$user]);
    }
    public function do_modify_user(Request $re){
    	$id = $re->id;
    	$name = $re->name;
    	$email = $re->email;
    	DB::table('users')->where('id','=',$id)->update(['name'=> $name,'email'=>$email]);
    	return redirect('list_user')->with('status', 'Update Profile Sucess');
    }
    public function delete_user($id){
    	DB::table('users')->where('id', '=', $id)->delete();
    	return redirect('list_user')->with('status', 'Deleted!');
    }
}
