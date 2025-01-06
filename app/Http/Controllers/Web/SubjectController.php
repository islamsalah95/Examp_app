<?php

namespace App\Http\Controllers\Web;

use App\Models\Subject;
use App\Models\PricingPlan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
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

       $pricingPlans= PricingPlan::get();
        
        return view('dash.web.subject.create',compact('pricingPlans'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->validated());

    
        if (!empty($request['pricing_plans'])) {
            $subject->pricingPlans()->attach($request['pricing_plans']);
        }

        return redirect()->route('subject.index')->with('success', 'Subject created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $pricingPlans= PricingPlan::get();

        return view('dash.web.subject.edit', compact('subject','pricingPlans'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {

        $subject->update($request->validated());

        if (!empty($request['pricing_plans'])) {
            $subject->pricingPlans()->sync($request['pricing_plans']);
        } else {
            $subject->pricingPlans()->detach(); // Clear the relationship if no pricing plans provided
        }

        return redirect()->route('subject.index')->with('success', 'Subject updated successfully');
    }


}
