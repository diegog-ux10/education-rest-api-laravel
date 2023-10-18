<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers);
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }

        return response()->json($teacher);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $teacher = Teacher::create($request->all());

        return response()->json($teacher, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }

        $teacher->update($request->all());

        return response()->json($teacher, 200);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }

        $teacher->delete();

        return response()->json(null, 204);
    }
}
