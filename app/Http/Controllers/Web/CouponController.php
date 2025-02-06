<?php

namespace App\Http\Controllers\Web;


use App\Models\Coupon;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.web.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        // Validate request data
        $data = $request->validated();

        for ($i = 0; $i < $request->count; $i++) {
            // Generate a unique coupon code
            $data['code'] = Str::upper(Str::random(5)); // Uppercase for better readability
            // Store the coupon in the database
            Coupon::create($data);
        }


        // Redirect with success message
        return redirect()->route('coupon.index')->with('success', 'Coupon created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('dash.web.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        // Update the coupon
        $coupon->update($request->validated());

        return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
