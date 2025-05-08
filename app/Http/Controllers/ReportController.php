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
        $hairType = strtolower(str_replace(' ', '_', $request->input('hair_type')));
        $faceShape = strtolower(str_replace(' ', '_', $request->input('face_shape')));
        $activity = strtolower(str_replace(' ', '_', $request->input('activity')));

        $hairTypeId = HairType::where('nama', $request->input('hair_type'))->first()?->id;
        $faceShapeId = FaceShape::where('nama', $request->input('face_shape'))->first()?->id;
        $activityId = Activity::where('nama', $request->input('activity'))->first()?->id;


        $rule = Rule::where('hair_type_id', $hairTypeId ?? 0)
                ->where('face_shape_id', $faceShapeId ?? 0)
                ->where('activity_id', $activityId ?? 0)
                ->first();

        if (!$rule) {
            return back()->with('error', 'Kombinasi rule tidak ditemukan di database.');
        }


        $filePath = storage_path('app/facts/rules.pl');
        $command = "swipl -s {$filePath} -g \"findall(Style, (hair_type('$hairType'), face_shape('$faceShape'), activity('$activity'), hair_style(Style)), Styles), writeln(Styles), halt.\"";
        $output = shell_exec($command);

        $output = trim($output, "[] \n"); 
        $styles = array_map(function($style) {
            return ucwords(str_replace('_', ' ', trim($style, "' ")));
        }, explode(',', $output));

        $hairStyles = HairStyle::whereIn('nama', $styles)->get();

        $rules = Rule::where('hair_type_id', $hairTypeId ?? 0)
            ->where('face_shape_id', $faceShapeId ?? 0)
            ->where('activity_id', $activityId ?? 0)
            ->get();

        if ($rules->isEmpty()) {
            return back()->with('error', 'Kombinasi rule tidak ditemukan di database.');
        }

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
