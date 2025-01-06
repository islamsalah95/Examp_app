<?php

namespace App\Http\Controllers\Web;

use App\Models\ExamSession;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamSessionRequest;
use App\Http\Requests\UpdateExamSessionRequest;

class ExamSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.web.subject.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamSessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSession $examSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamSession $examSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamSessionRequest $request, ExamSession $examSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamSession $examSession)
    {
        //
    }
}
