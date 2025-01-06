@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Mood/</span>Show
@endsection

@section('content')


@livewire('mood.index')


@endsection
