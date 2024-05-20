<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ClassModel::getClasses();
        $data['header_title'] = "Class List";
        return view('admin.class.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Class";
        return view('admin.class.add', $data);
    }

    public function addclass(Request $request)
    {
        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        // dd($request->all());


        return redirect('admin/class/list')->with('success', 'class created successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = ClassModel::getById($id);

        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Class";
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }

    public function editClass($id, Request $request){
        $data['getRecord'] = ClassModel::getById($id);

        $save = ClassModel::getById($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = 1;

        $save->save();

        return redirect('admin/class/list')->with('success','class updated successfully');
    }
}
