@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <!-- Title -->
        <h1 class="mb-4">Welcome to Laravel 10 Multi Guards Authentication</h1>
        
        <!-- Description / Explanation -->
        <blockquote class="blockquote text-center h5">
            Hi friends, in this tutorial you have learned how to create and set up a multi-guard authentication application in Laravel 10.
            <br>
            To learn more, visit <strong><a href="https://www.laravelclick.com/category/laravel">Recommended Laravel Tutorials</a></strong> and improve your skills.
        </blockquote>

        <!-- Features Section -->
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="feature-box">
                    <h3>Secure Authentication</h3>
                    <p>With multi-guards, your application can handle different user types securely, each with its own authentication system.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <h3>Easy Setup</h3>
                    <p>Laravel makes it simple to set up authentication guards, allowing you to focus on building features instead of authentication logic.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <h3>Modern UI</h3>
                    <p>Enjoy a clean and responsive UI with Bootstrap for a seamless user experience across devices.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection