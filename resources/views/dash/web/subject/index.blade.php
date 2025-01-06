@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Subject/</span>Show
@endsection

@section('content')


@livewire('subject.index')


@endsection
