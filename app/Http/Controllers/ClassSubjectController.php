<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request){
        $data['getRecord'] = ClassSubjectModel::getRecord();

        $data['header_title'] = "Assign Subject";
        return view('admin.assign_subject.list',$data);
    }


    public function add(Request $request){
           $data['getRecord'] = ClassSubjectModel::getRecord();
           $data['getClass'] = ClassModel::getClass();
           $data['getSubject'] = SubjectModel::getSubject();
           $data['header_title'] = "Assign Subject";
           return view('admin.assign_subject.add',$data);
    }

    public function addsubject(Request $request){
        // dd($request->all());
        if(!empty($request->subject_id)){
            foreach($request->subject_id as $subject_id){
                $save = new ClassSubjectModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $subject_id;
                $save->status = $request->status;
                $save->created_by = Auth::User()->id;
                $save->save();
                            


                
            }
        }else{
            return redirect()->back()->with('error','Please select atleast one subject');
        }
    }
}
