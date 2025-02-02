<?php

namespace App\Http\Controllers\Web;

use App\Models\Subject;
use App\Models\PricingPlan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePricingPlanRequest;
use App\Http\Requests\UpdatePricingPlanRequest;


class PricingPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Subject $subject)
    {
        $pricingPlans = PricingPlan::with('subject')->where('subject_id',$subject->id)->get();
        return view('dash.web.pricing-plan.index', compact('pricingPlans','subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Subject $subject)
    {
        return view('dash.web.pricing-plan.create',compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePricingPlanRequest $request)
    {


        PricingPlan::create($request->all());

        return redirect()->back()->with('success', 'Pricing plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PricingPlan $pricingPlan)
    {
        return view('dash.web.pricing-plan.show', compact('pricingPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PricingPlan $pricingPlan)
    {
        return view('dash.web.pricing-plan.edit', compact('pricingPlan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePricingPlanRequest $request, PricingPlan $pricingPlan)
    {


        $pricingPlan->update($request->all());

        return redirect()->back()->with('success', 'Pricing plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        $pricingPlan->delete();

        return redirect()->route('pricing-plan.index')->with('success', 'Pricing plan deleted successfully.');
    }
}
