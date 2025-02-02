<?php

namespace App\Http\Controllers\Web;

use App\Models\Mood;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMoodRequest;
use App\Http\Requests\UpdateMoodRequest;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.mood.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.web.mood.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMoodRequest $request)
    {
        Mood::create($request->validated());
        return redirect()->route('mood.index')->with('success', 'mood created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Mood $mood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mood $mood)
    {

        return view('dash.web.mood.edit', compact('mood'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMoodRequest $request, Mood $mood)
    {
        $mood->update($request->validated());
        return redirect()->route('mood.index')->with('success', 'mood Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mood $mood)
    {
        //
    }
}
