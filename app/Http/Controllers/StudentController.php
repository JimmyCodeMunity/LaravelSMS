<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        return view('admin.student.add', $data);
    }
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        return view('admin.student.list', $data);
    }

    public function addstudent(Request $request)
    {
        // dd($request->all());
        $student = new User();
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        if (!empty($request->date_of_birth)) {
            $student->admission_date = trim($request->admission_date);
        }
        $student->status = trim($request->status);

        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('uploads/profile', $filename);
            $student->profile_pic = $filename;
        }
        $student->profile_pic = trim($request->profile_pic);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();


        return redirect('admin/student/list')->with('success', 'new student added successfully');
    }
}
