<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = 'class_subjects';


    static public function getRecord(){
        // return self::select('class_subjects.*','class.name as classname','users.name as username','subject.name as subjectname')
        // ->join('subject','subject.id','=','class_subjects.subject_id')
        // ->join('class','class.id', '=','class_subjects.class_id')
        // ->join('users','users.id','=','class_subjects.created_by')

        // ->orderby('class_subjects.id','desc')
        // // ->paginate(20);
        // ->get();

        $return =  self::select('class_subjects.*','subject.name as subjectname','class.name as classname','users.name as username')
        ->join('subject','subject.id','=', 'class_subjects.subject_id')
        ->join('class','class.id','=','class_subjects.class_id')
        ->join('users','users.id','=','class_subjects.created_by');

        if(!empty(Request::get('class_name'))){
            $return->where('class.name','like','%'.Request::get('class_name').'%');
        }
        if(!empty(Request::get('subject_name'))){
            $return->where('subject.name','like','%'.Request::get('subject_name').'%');
        }
        if(!empty(Request::get('date'))){
            $return->whereDate('class_subjects.created_at','=',Request::get('date'));
        }

        
        $return = $return->orderBy('class_subjects.id','desc')
        ->where('class_subjects.is_delete','=',0)
        ->paginate(5);
        return $return;
    }


    static public function getAlreadyFirst($class_id,$subject_id){
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }

    static public function getSingle($id){
        return self::find($id);
    }


    static public function getAssignedSubjectID($class_id){
        return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();

    }


    static public function deleteSubject($class_id){
        return self::where('class_id','=',$class_id)->delete();

    }
}
