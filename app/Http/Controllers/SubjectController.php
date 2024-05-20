<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getSubjects();
        $data['header_title'] = "Class List";
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Subject";
        return view('admin.subject.add', $data);
    }

    public function addsubject(Request $request)
    {
        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->type = $request->type;
        $save->created_by = Auth::user()->id;
        $save->save();
        // dd($request->all());


        return redirect('admin/subject/list')->with('success', 'subjects created successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getById($id);

        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function editSubject($id, Request $request){
        $data['getRecord'] = SubjectModel::getById($id);

        $save = SubjectModel::getById($id);
        $save->type = trim($request->type);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = 1;

        $save->save();

        return redirect('admin/subject/list')->with('success','subject updated successfully');
    }

    public function deleteSubject($id){
        $user = SubjectModel::getById($id);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success','subject deleted successfully');

    }
}
