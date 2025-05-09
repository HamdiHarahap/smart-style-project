<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Report;
use App\Models\Activity;
use App\Models\HairType;
use App\Models\FaceShape;
use App\Models\HairStyle;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $hairTypes = HairType::all();
        $faceShapes = FaceShape::all();
        $activities = Activity::all();

        return view('pages.question', [
            'hairTypes' => $hairTypes,
            'faceShapes' => $faceShapes,
            'activities' => $activities
        ]);
    }

    public function store(Request $request)
    {
        $hairTypeId = HairType::where('nama', $request->input('hair_type'))->first()?->id;
        $faceShapeId = FaceShape::where('nama', $request->input('face_shape'))->first()?->id;
        $activityId = Activity::where('nama', $request->input('activity'))->first()?->id;

        if (!$hairTypeId || !$faceShapeId || !$activityId) {
            return view('pages.rekomendasi')->with('error', 'Data input tidak valid.');
        }

        $rules = Rule::where('hair_type_id', $hairTypeId)
            ->where('face_shape_id', $faceShapeId)
            ->where('activity_id', $activityId)
            ->get();

        if ($rules->isEmpty()) {
            return view('pages.rekomendasi')->with('error', 'Hair style reccommendation not found');
        }

        $hairStyles = $rules->map(function ($rule) {
            return $rule->hairStyle;
        });

        foreach ($rules as $rule) {
            Report::create([
                'nama_user' => $request->input('nama'),
                'email' => $request->input('email'),
                'rule_id' => $rule->id
            ]);
        }

        return view('pages.rekomendasi', [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'hair_style' => $hairStyles,
        ]);
    }

    public function show()
    {
        return view('pages.rekomendasi');
    }
}
