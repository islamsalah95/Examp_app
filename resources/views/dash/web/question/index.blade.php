@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Question/</span>Show
@endsection

@section('content')


@livewire('question.index')


@endsection
