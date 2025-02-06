@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Exam Sessions /</span> Preview
@endsection

@section('content')
    <div class="container">
        <!-- Session Details -->
        <div class="card mb-4">
            <div class="card-header text-white">
                <h5 class="mb-0">Exam Session Details</h5>
            </div>
            <div class="card-body">
                <!-- Basic Session Details -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>Session ID:</strong> {{ $examSession->id }}</p>
                        <p><strong>User ID:</strong> {{ $examSession->user_id }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Status:</strong>
                            <span class="badge bg-{{ $examSession->status == 'ongoing' ? 'warning text-dark' : 'success' }}">
                                {{ ucfirst($examSession->status) }}
                            </span>
                        </p>
                        <p><strong>Created At:</strong> {{ $examSession->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <!-- Exam Performance Summary -->
                <div class="mb-4">
                    <h6>Exam Performance Summary</h6>
                    <div class="row">
                        <!-- Total Questions -->
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $examSession->getTotalDegreeExamSession()['total'] }}</h5>
                                    <p class="card-text text-muted">Total Questions</p>
                                </div>
                            </div>
                        </div>

                        <!-- Answered Questions -->
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $examSession->getTotalDegreeExamSession()['answer'] }}</h5>
                                    <p class="card-text text-muted">Answered</p>
                                </div>
                            </div>
                        </div>

                        <!-- Correct Answers -->
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $examSession->getTotalDegreeExamSession()['correct'] }}</h5>
                                    <p class="card-text text-muted">Correct</p>
                                </div>
                            </div>
                        </div>

                        <!-- Incorrect Answers -->
                        <div class="col-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $examSession->getTotalDegreeExamSession()['incorrect'] }}</h5>
                                    <p class="card-text text-muted">Incorrect</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Bars -->
                <div class="mb-4">
                    <h6>Progress Overview</h6>
                    <div class="progress mb-3" style="height: 25px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ ($examSession->getTotalDegreeExamSession()['correct'] / $examSession->getTotalDegreeExamSession()['total']) * 100 }}%"
                            aria-valuenow="{{ ($examSession->getTotalDegreeExamSession()['correct'] / $examSession->getTotalDegreeExamSession()['total']) * 100 }}"
                            aria-valuemin="0" aria-valuemax="100">
                            Correct: {{ $examSession->getTotalDegreeExamSession()['correct'] }}
                        </div>
                        <div class="progress-bar bg-danger" role="progressbar"
                            style="width: {{ ($examSession->getTotalDegreeExamSession()['incorrect'] / $examSession->getTotalDegreeExamSession()['total']) * 100 }}%"
                            aria-valuenow="{{ ($examSession->getTotalDegreeExamSession()['incorrect'] / $examSession->getTotalDegreeExamSession()['total']) * 100 }}"
                            aria-valuemin="0" aria-valuemax="100">
                            Incorrect: {{ $examSession->getTotalDegreeExamSession()['incorrect'] }}
                        </div>
                        <div class="progress-bar bg-secondary" role="progressbar"
                            style="width: {{ ($examSession->getTotalDegreeExamSession()['notAnswer'] / $examSession->getTotalDegreeExamSession()['total']) * 100 }}%"
                            aria-valuenow="{{ ($examSession->getTotalDegreeExamSession()['notAnswer'] / $examSession->getTotalDegreeExamSession()['total']) * 100 }}"
                            aria-valuemin="0" aria-valuemax="100">
                            Unanswered: {{ $examSession->getTotalDegreeExamSession()['notAnswer'] }}
                        </div>
                    </div>
                </div>

                <!-- Total Degree -->
                <div class="alert alert-info">
                    <h6>Total Degree: {{ $examSession->getTotalDegreeExamSession()['totalDegree'] }}</h6>
                </div>
            </div>
        </div>

        <!-- Questions List -->
        <div class="accordion" id="questionsAccordion">
            @foreach ($examSession->examHistories as $history)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $history->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $history->id }}">
                            <strong>Question:</strong> {{ $history->examQuestion->question_text }}
                        </button>
                    </h2>
                    <div id="collapse{{ $history->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#questionsAccordion">
                        <div class="accordion-body">
                            <p class="text-muted">Description: {!! $history->examQuestion->description !!}</p>
                            <ul class="list-group">
                                @foreach ($history->examQuestion->answers as $answer)
                                    <li
                                        class="list-group-item 
                                        @if ($answer->is_correct) bg-success text-white 
                                        @elseif($answer->id == $history->examAnswer->id) bg-danger text-white @endif">
                                        {{ $answer->is_correct ? '✅' : '❌' }} {{ $answer->answer_text }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
