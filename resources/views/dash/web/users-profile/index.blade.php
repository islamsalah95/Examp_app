@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Users Profile/</span>Show
@endsection

@section('content')


@livewire('users-profile.index')

@endsection
