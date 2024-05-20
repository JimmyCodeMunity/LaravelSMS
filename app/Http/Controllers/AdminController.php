<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }


    public function add(){
        $data['header_title'] = "Add Admin";
        return view('admin.admin.add', $data);
    }


    public function addadmin(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);
        // dd($request->all());
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();


        return redirect('admin/admin/list')->with('success','admin added successfully');


    }


    public function editadmin($id){
        
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit', $data);
            
        }else{
            abort(404);
        }
        
    }

    public function updateadmin($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->user_type = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success','admin Updated successfully');
    }


    public function deleteadmin($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success','admin Deleted successfully');

    }
}
