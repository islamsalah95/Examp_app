@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Exam Sessions/</span>Show
@endsection

@section('content')


@livewire('exam-session.index')


@endsection
