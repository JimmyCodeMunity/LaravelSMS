<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subject';



    static public function getSubjects()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by');

        if (!empty(Request::get('name'))) {
            $return->where('subject.name', 'LIKE', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('type'))) {
            $return->where('subject.type', 'LIKE', '%' . Request::get('type') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', '=', Request::get('date'));
        }


        $return = $return->where('subject.is_delete', '=', 0)
            ->orderBy('subject.id', 'desc')
            ->paginate(5);

        return $return;
    }

    public static function getById($id)
    {
        return self::find($id);
    }

    static public function getSubject()
    {
        $return = SubjectModel::select('subject.*')
            ->join('users', 'users.id', 'subject.created_by')


            ->where('subject.is_delete', '=', 0)
            ->where('subject.status', '=', 0)
            ->orderBy('subject.name', 'asc')
            ->get();

        return $return;
    }
}
