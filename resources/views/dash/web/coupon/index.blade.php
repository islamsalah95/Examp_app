@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Coupons/</span>Show
@endsection

@section('content')


@livewire('coupon.index')


@endsection
