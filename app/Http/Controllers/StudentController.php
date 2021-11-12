<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DateTime;
use Illuminate\Support\Facades\Date;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = date('Y-m-d H:i:s');

        $student = new Student();

        $check = Student::where('name', $request->name)->first();

        if ($request->name == null || $request->nim == null || $request->email == null || $request->jurusan == null) {
            $data = [
                'message' => 'parameter cannot be empty'
            ];

            return response()->json($data);
        }
        
        if ($check != null) {
            $data = [ 
                'message' => 'name already exists'
            ];
        } else {
            $student->name = $request->name; 
            $student->nim = $request->nim;
            $student->email = $request->email;
            $student->jurusan = $request->jurusan;
            $student->created_at = $timestamp;
            $student->save();
            
            $data = [
                'message' => 'create data has success full',
                'data' => $student
            ];
        }

        return response()->json($data, 201);
    }

    public function find(Request $request, $id)
    {
        if (!is_numeric($id)) {
            $data = [
                'message' => 'data must be number'
            ];

            return response()->json($data, 503);
        }

        $find = Student::where('id', $id)->first();
        if ($find == null) {
            $data = [
                'messege' => 'data not found'
            ];

            return response()->json($data);
        } else {
            return response()->json($find);
        }
    }

    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = date('Y-m-d H:i:s');

        $doChange = Student::where('id', $request->id)->first();

        if ($doChange == null) {
            $data = [
                'message' => 'the data you want to update was not found'
            ];

            return response()->json($data, 404);
        }

        $doChange->name = $request->name != null ? $request->name : $doChange->name;
        $doChange->nim = $request->nim != null ? $request->nim : $doChange->nim;
        $doChange->email = $request->email != null ? $request->email : $doChange->email;
        $doChange->jurusan = $request->jurusan != null ? $request->jurusan : $doChange->jurusan;
        $doChange->updated_at = $timestamp;
        $doChange->save();

        $message = [
            'message' => 'update data has success full',
            'data' => $doChange
        ];

        return response()->json($message, 201);
    }

    public function destroy(Request $request)
    {
        $delete = Student::where('id', $request->id)->first();
        
        if ($delete == null) {
            $data = [
                'message' => 'the data you want to delete was not found'
            ];

            return response()->json($data, 404);
        }

        $delete->delete();

        $message = [
            'message' => 'delete data has success full',
            'data' => $delete
        ];

        return response()->json($message, 200);
    }
}
