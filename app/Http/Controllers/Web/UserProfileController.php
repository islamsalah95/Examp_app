<?php
namespace App\Http\Controllers\Web;


use App\Models\User;
use App\Http\Controllers\Controller;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dash.web.users-profile.index');
    }



    /**
     * Display the specified resource.
     */
    public function show($users_profile)
    {

        $users_profile = User::with('examSessions' , 'examSessions.examHistories','examSessions.subject','subscriptions','subscriptions.pricingPlan')->where('id',$users_profile)->first();

        return view('dash.web.users-profile.show',compact('users_profile'));

    }






}
