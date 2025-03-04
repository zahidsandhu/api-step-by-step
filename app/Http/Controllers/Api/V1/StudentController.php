<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function list(Student $std_list){
        return $std_list->all();;
    }

    public function addStudent(Request $request, Student $add){
        if($add->create($request->all())){
            return response()->json([
                "message"=>'student successfully save',
                'status'=>'success',
            ],200);
        }else{
            return response()->json([
                "message"=>'not save something went roung',
                'status'=>'error',
            ],400);
        }
    }
    public function updateStudent(Request $request){
        // return $update;
       $update = Student::find($request->id);
        if($update && $update->update($request->all())){
            return response()->json([
                "message"=>'student successfully update',
                'status'=>'success',
            ],200);
        }else{
            return response()->json([
                "message"=>'not update something went roung',
                'status'=>'error',
            ],400);
        }
    }

    public function editStudent(Student $id){
        return $id;
    }
    public function deleteStudent($id){
        $delete = Student::destroy($id);
        if($delete){
            return response()->json([
                "message"=>'student successfully delete',
                'status'=>'success',
            ],200);
        }else{
            return response()->json([
                "message"=>'not delete something went roung',
                'status'=>'error',
            ],400);
        }
    }
}
