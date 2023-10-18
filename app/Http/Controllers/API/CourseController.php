<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return response()->json($courses);
    }

    public function show($id)
    {
        $course = Course::with('teacher')->find($id);

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        return response()->json($course);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $course = Course::create($request->all());

        return response()->json($course, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $course = Course::find($id);

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        $course->update($request->all());

        return response()->json($course, 200);
    }

    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        $course->delete();

        return response()->json(null, 204);
    }
}
