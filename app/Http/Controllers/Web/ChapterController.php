<?php

namespace App\Http\Controllers\Web;

use App\Models\Chapter;
use App\Models\Subject;
use Mockery\Matcher\Subset;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.chapter.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $subjects=Subject::get();
        return view('dash.web.chapter.create',compact('subjects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        
        Chapter::create($request->validated());
        return redirect()->route('chapter.index')->with('success', 'Chapter created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $subjects=Subject::get();
        return view('dash.web.chapter.edit',compact('subjects','chapter'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());

        return redirect()->route('chapter.index')->with('success', 'chapter updated successfully');
    }


}
