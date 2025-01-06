<?php

namespace App\Http\Controllers\Web;

use App\Models\ExamHistory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamHistoryRequest;
use App\Http\Requests\UpdateExamHistoryRequest;

class ExamHistoryController extends Controller
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
    public function store(StoreExamHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamHistory $examHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamHistory $examHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamHistoryRequest $request, ExamHistory $examHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamHistory $examHistory)
    {
        //
    }
}
