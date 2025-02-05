<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\MoodController;
use App\Http\Controllers\Dash\RoleController;
use App\Http\Controllers\Dash\AdminController;
use App\Http\Controllers\Web\CouponController;
use App\Http\Controllers\Web\ChapterController;
use App\Http\Controllers\Web\SubjectController;
use App\Http\Controllers\Dash\SettingController;
use App\Http\Controllers\Web\QuestionController;
use App\Http\Controllers\Web\ExamSessionController;
use App\Http\Controllers\Web\PricingPlanController;
use App\Http\Controllers\Web\UserProfileController;
use App\Http\Controllers\Web\SubscriptionController;


Route::prefix('dashboard')->middleware(['AdminAuth', 'auth:admin'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    // Resource route for roles
    Route::resource('roles', RoleController::class);
    // Resource route for admins excluding 'show' (viewing a specific admin)
    Route::resource('admins', AdminController::class)->except(['show']);
    // Custom routes for admin profile management
    Route::get('admins/profile', [AdminController::class, 'profile'])->name('admins.profile');
    Route::put('admins/profile/update', [AdminController::class, 'updateProfile'])->name('admins.profile.update');
    // Settings routes
    Route::get('settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings/update', [SettingController::class, 'update'])->name('settings.update');
    Route::get('settings/sitemap', [SettingController::class, 'sitemap'])->name('settings.sitemap');

    Route::resource('pricing-plan',      PricingPlanController::class)->except('create', 'index');
    Route::get('pricing-plan/create/{subject}', [PricingPlanController::class, 'create'])->name('pricing-plan.create');
    Route::get('pricing-plan/index/{subject}', [PricingPlanController::class, 'index'])->name('pricing-plan.index');

    Route::resource('subject',      SubjectController::class);

    Route::resource('chapter',      ChapterController::class);
    Route::resource('exam',      ExamController::class);



    Route::resource('question',     QuestionController::class)->except('editAnswers', 'updateAnswers');
    Route::get('question/edit-answers/{question}', [QuestionController::class, 'editAnswers'])->name('question.editAnswers');
    Route::put('question/edit-answers/{question}', [QuestionController::class, 'updateAnswers'])->name('question.updateAnswers');

    Route::resource('mood',         MoodController::class);

    Route::resource('exam-session',  ExamSessionController::class); 

    Route::resource('users-profiles',  UserProfileController::class); 

    Route::resource('subscription', SubscriptionController::class); 
    

    Route::resource('coupon',  CouponController::class); 


});
