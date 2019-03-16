<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
// use App\Http\Requests\StoreCustoms;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
        //<dad>.<child>.<child2>
    }
    public function list_user()
    {
    	$users = DB::table('users')->paginate(10);
    	return view('admin.users.list_user',['users'=>$users]);
    }
    public function get_add_user()
    {
    	return view('admin.users.add_user');
    }
    public function add_user(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'email' => 'required|unique:users',
                'pass2' => 'same:pass',
                'pass' => 'required|min:3',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'This email already taken by another user',
                'pass.required' => 'Password is required',
                'pass2.same' => 'Password confirm is not match'
            ]
        );
    	$name = $request->name;
    	$email = $request->email;
    	$pass = $request->pass;
    	$pass2 = $request->pass2;
    	$password = Hash::make($pass);
    	DB::table('users')->insert(['name' => $name, 'email' => $email, 'password' => $password]
    		);    	
    	return redirect('list_user')->with('status', 'Create User Sucess!');
    }
    public function get_modify_user($id){
    	$user = DB::table('users')->where('id','=',$id)->get();
    	return view('admin.users.modify_user',['user'=>$user]);
    }
    public function do_modify_user(Request $re){
        $re->validate([
            'name' => 'required|max:255',
            'email' => 'unique:users,email,'.$re->id,
            'pass' => 'required',

        ]);
    	$id = $re->id;
    	$name = $re->name;
    	$email = $re->email;
        $pass = $re->pass;
    	DB::table('users')->where('id','=',$id)->update(['name'=> $name,'email'=>$email,'password'=>$pass]);
    	return redirect('list_user')->with('status', 'Update Profile Sucess');
    }
    public function delete_user($id){
    	DB::table('users')->where('id', '=', $id)->delete();
    	return redirect('list_user')->with('status', 'Deleted!');
    }
    public function search_user(Request $re){
        $key = $re->search_key;
        $result = DB::table('users')->where('name','like','%'.$key.'%')->orWhere('email','like','%'.$key.'%')->paginate(10);
        return view('admin.users.list_user',['users'=>$result]);
    }
}
