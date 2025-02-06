@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Coupon /</span> Create
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header text-white">
                    <h5 class="mb-0">Create New Coupon</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf

                        <!-- Coupon count -->
                        <div class="mb-3">
                            <label for="count" class="form-label">Coupon Count</label>
                            <input type="number" name="count" id="count" class="form-control @error('count') is-invalid @enderror"
                                   value="{{ old('count') }}" required>
                            @error('count')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Discount Percent -->
                        <div class="mb-3">
                            <label for="percent" class="form-label">Discount Percent</label>
                            <input type="number" name="percent" id="percent" class="form-control @error('percent') is-invalid @enderror"
                                   value="{{ old('percent', 0) }}" min="0" max="100" required>
                            @error('percent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Maximum Uses -->
                        <div class="mb-3">
                            <label for="max_uses" class="form-label">Max Uses (Optional)</label>
                            <input type="number" name="max_uses" id="max_uses" class="form-control @error('max_uses') is-invalid @enderror"
                                   value="{{ old('max_uses') }}" min="1">
                            @error('max_uses')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Start Date -->
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                   value="{{ old('start_date') }}">
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                   value="{{ old('end_date') }}">
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
