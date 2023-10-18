<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $registrations = CourseRegistration::with('course', 'student')->get();
        return response()->json($registrations);
    }

    public function show($id)
    {
        $registration = CourseRegistration::with('course', 'student')->find($id);

        if (!$registration) {
            return response()->json(['error' => 'Registration not found'], 404);
        }

        return response()->json($registration);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            // Add other validation rules
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $registration = CourseRegistration::create($request->all());

        return response()->json($registration, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            // Add other validation rules
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $registration = CourseRegistration::find($id);

        if (!$registration) {
            return response()->json(['error' => 'Registration not found'], 404);
        }

        $registration->update($request->all());

        return response()->json($registration, 200);
    }

    public function destroy($id)
    {
        $registration = CourseRegistration::find($id);

        if (!$registration) {
            return response()->json(['error' => 'Registration not found'], 404);
        }

        $registration->delete();

        return response()->json(null, 204);
    }
}
