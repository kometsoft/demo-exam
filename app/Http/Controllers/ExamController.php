<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('exam.index', [
            'exams' => Exam::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }

    public function editMark(Exam $exam)
    {
        return view('exam.mark.edit', [
            'exam' => $exam->load('users'),
        ]);

        // return view('exam.mark.edit', compact('exam'));
    }

    public function updateMark(Request $request, Exam $exam)
    {
        $request->validate([
            'marks.*.mark' => ['required', 'integer', 'max:100', 'min:0']
        ]);

        $exam->users()->sync($request->input('marks'));

        return back()->with('success', 'Markah berjaya dikemaskini.');
    }

    public function importMark(Exam $exam)
    {
        return view('exam.mark.import', [
            'exam' => $exam
        ]);
    }
}
