<?php

namespace App\Http\Controllers\Web;

use App\Models\Exam;
use App\Models\Chapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.exam.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chapters=Chapter::get();
        return view('dash.web.exam.create',compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamRequest $request)
    {
        
        Exam::create($request->validated());
        return redirect()->route('exam.index')->with('success', 'exam created successfully');

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
        $chapters=Chapter::get();
        return view('dash.web.exam.edit',compact('chapters','exam'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update($request->validated());

        return redirect()->route('exam.index')->with('success', 'exam updated successfully');
    }


}
