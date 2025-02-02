@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Subscription/</span>Show
@endsection

@section('content')


@livewire('subscription.index')

@endsection
