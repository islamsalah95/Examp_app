@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Users Profile/</span>Details
@endsection

@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('dash/assets/img/pages/profile-banner.png') }}" alt="Banner image"
                        class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset('dash/assets/img/avatars/14.png') }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $users_profile->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-color-swatch"></i> Doctor
                                    </li>
                                    <li class="list-inline-item d-flex gap-1"><i class="ti ti-map-pin"></i>
                                        {{ $users_profile->country }}
                                    </li>
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-calendar"></i> Joined
                                        {{ \Carbon\Carbon::parse($users_profile->created_at)->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary">
                                <i class="ti ti-check me-1"></i>Connected
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->


    <!-- User Profile Content -->
    <div class="row">
        <!-- About User Section -->
        <div class="col-xl-3 col-lg-4 col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="text-uppercase">About</h6>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user text-heading"></i>
                            <span class="fw-medium mx-2 text-heading">Full Name:</span>
                            <span>{{ $users_profile->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-check text-heading"></i>
                            <span class="fw-medium mx-2 text-heading">Status:</span>
                            <span>{{ $users_profile->status }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-flag text-heading"></i>
                            <span class="fw-medium mx-2 text-heading">Country:</span>
                            <span>{{ $users_profile->country }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-map-pin text-heading"></i>
                            <span class="fw-medium mx-2 text-heading">Address:</span>
                            <span>{{ $users_profile->address }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-language text-heading"></i>
                            <span class="fw-medium mx-2 text-heading">Languages:</span>
                            <span>English</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-clock text-heading"></i>
                            <span class="fw-medium mx-2 text-heading">Last Login:</span>
                            <span>{{ Carbon\Carbon::parse($users_profile->last_login)->diffForHumans() }}</span>
                        </li>
                    </ul>
                    <h6 class="text-uppercase">Contacts</h6>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-phone-call"></i>
                            <span class="fw-medium mx-2 text-heading">Contact:</span>
                            <span>{{ $users_profile->mobile }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-mail"></i>
                            <span class="fw-medium mx-2 text-heading">Email:</span>
                            <span>{{ $users_profile->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End About User Section -->

        <!-- Profile Overview Section -->
        <div class="col-xl-9 col-lg-8 col-md-8 d-flex flex-wrap gap-4 justify-content-between">
            <!-- Subscription Card -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <span class="badge bg-label-success rounded-pill p-3">
                            <i class="ti ti-book ti-md"></i>
                        </span>
                        <h5 class="card-title mt-2">{{ $users_profile->subscriptions->count() }}</h5>
                        <small class="text-muted">Subjects Subscription</small>
                    </div>
                </div>
            </div>
            <!-- End Subscription Card -->

            <!-- Total Paying Amounts -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <span class="badge bg-label-warning rounded-pill p-3">
                            <i class="ti ti-wallet ti-md"></i>
                        </span>
                        <h5 class="card-title mt-2">{{ $users_profile->totalAmountPaid() }}</h5>
                        <small class="text-muted">Total Paying Amounts</small>
                    </div>
                </div>
            </div>
            <!-- End Total Paying Amounts -->

            <!-- User Sessions -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <span class="badge bg-label-warning rounded-pill p-3">
                            <i class="ti ti-wallet ti-md"></i>
                        </span>
                        <h5 class="card-title mt-2">{{ $users_profile->examSessions->count() }}</h5>
                        <small class="text-muted">User Sessions</small>
                    </div>
                </div>
            </div>
            <!-- End User Sessions -->

            <!-- Used Cpupon -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <span class="badge bg-label-warning rounded-pill p-3">
                            <i class="ti ti-wallet ti-md"></i>
                        </span>
                        <h5 class="card-title mt-2">{{ $users_profile->examSessions->count() }}</h5>
                        <small class="text-muted">Used Cpupon</small>
                    </div>
                </div>
            </div>
            <!-- Used Cpupon-->


            <!-- Used Cpupon -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <span class="badge bg-label-warning rounded-pill p-3">
                            <i class="ti ti-wallet ti-md"></i>
                        </span>
                        <h5 class="card-title mt-2">{{ $users_profile->examSessions->count() }}</h5>
                        <small class="text-muted">Used Cpupon</small>
                    </div>
                </div>
            </div>
            <!-- Used Cpupon-->

            <!-- Tasks Overview -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-6">
                                <span class="badge bg-label-info p-2 rounded-circle">
                                    <i class="ti ti-check ti-md"></i>
                                </span>
                                <p class="mb-1 mt-2 text-muted">Completed</p>
                                <h5 class="mb-0 fw-bold">{{ $users_profile->totalExamSessionsStatus()['completed'] }}</h5>
                            </div>
                            <div class="col-6">
                                <span class="badge bg-label-primary p-2 rounded-circle">
                                    <i class="ti ti-refresh ti-md"></i>
                                </span>
                                <p class="mb-1 mt-2 text-muted">Ongoing</p>
                                <h5 class="mb-0 fw-bold">{{ $users_profile->totalExamSessionsStatus()['ongoing'] }}</h5>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 8px">
                            @php
                                $completed = $users_profile->totalExamSessionsStatus()['completed'];
                                $ongoing = $users_profile->totalExamSessionsStatus()['ongoing'];
                                $total = $completed + $ongoing;
                                $completedPercentage = $total > 0 ? ($completed / $total) * 100 : 0;
                                $ongoingPercentage = $total > 0 ? ($ongoing / $total) * 100 : 0;
                            @endphp

                            <div class="progress-bar bg-info" style="width: {{ $completedPercentage }}%;"
                                role="progressbar" aria-valuenow="{{ $completedPercentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                            <div class="progress-bar bg-primary" style="width: {{ $ongoingPercentage }}%;"
                                role="progressbar" aria-valuenow="{{ $ongoingPercentage }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Tasks Overview -->
        </div>
        <!-- End Profile Overview Section -->
    </div>



    <!-- sessions Exams -->
    <div class="row">

        @livewire('exam-session.index', ['userId' => $users_profile->id])


    </div>
    <!--/ sessions Exams  -->

    <!--/ User Profile Content -->
@endsection
