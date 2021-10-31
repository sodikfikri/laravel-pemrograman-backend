<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function create(Request $request)
    {
        $student = new Student();

        $check = Student::where('name', $request->name)->first();
        
        if ($check != null) {
            $data = [
                'message' => 'name already exists',
                'data' => null
            ];
        } else {
            $student->name = $request->name;
            $student->nim = $request->nim;
            $student->email = $request->email;
            $student->jurusan = $request->jurusan;
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
        return response()->json(Student::where('id', $id)->first());
    }

    public function update(Request $request)
    {
        $doChange = Student::where('id', $request->id)->first();
        $doChange->name = $request->name;
        $doChange->nim = $request->nim;
        $doChange->email = $request->email;
        $doChange->jurusan = $request->jurusan;
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
        
        $delete->delete();

        $message = [
            'message' => 'delete data has success full',
            'data' => $delete
        ];

        return response()->json($message, 201);
    }
}
