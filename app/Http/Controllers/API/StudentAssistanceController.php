<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StudentAssistance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentAssistanceController extends Controller
{
    public function index()
    {
        $assistances = StudentAssistance::with('student', 'course')->get();
        return response()->json($assistances);
    }

    public function show($id)
    {
        $assistance = StudentAssistance::with('student', 'course')->find($id);

        if (!$assistance) {
            return response()->json(['error' => 'Assistance record not found'], 404);
        }

        return response()->json($assistance);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'attendance_status' => 'required|in:A,T,F',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $assistance = StudentAssistance::create($request->all());

        return response()->json($assistance, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'attendance_status' => 'required|in:A,T,F',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $assistance = StudentAssistance::find($id);

        if (!$assistance) {
            return response()->json(['error' => 'Assistance record not found'], 404);
        }

        $assistance->update($request->all());

        return response()->json($assistance, 200);
    }

    public function destroy($id)
    {
        $assistance = StudentAssistance::find($id);

        if (!$assistance) {
            return response()->json(['error' => 'Assistance record not found'], 404);
        }

        $assistance->delete();

        return response()->json(null, 204);
    }

    public function getAssitenceWithFilters(Request $request)
    {
        $query = StudentAssistance::query();

        $query->when($request->has('course_id'), function ($query) use ($request) {
            $query->where('course_id', $request->input('course_id'));
        });

        $query->when($request->has('student_id'), function ($query) use ($request) {
            $query->where('student_id', $request->input('student_id'));
        });

        $query->when($request->has('date'), function ($query) use ($request) {
            $query->where('date', $request->input('date'));
        });

        $result = $query->get();

        if (!count($result)) {
            return response()->json(['error' => 'Assistance record not found'], 404);
        }

        return response()->json($result);
    }
}
