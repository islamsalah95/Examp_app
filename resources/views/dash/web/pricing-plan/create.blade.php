@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Pricing Plan//Create</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pricing-plan.store') }}" method="POST">
                        @csrf
                         <input type="number" name="subject_id" value="{{ $subject->id }}" style="display: none">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="period_count" class="form-label">Period Count</label>
                            <input type="number" class="form-control @error('period_count') is-invalid @enderror" id="period_count" name="period_count" value="{{ old('period_count') }}">
                            @error('period_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="period_type" class="form-label">Period Type</label>
                            <select class="form-control @error('period_type') is-invalid @enderror" id="period_type" name="period_type">
                                <option value="weeks" @selected(old('period_type') == 'weeks')>Weeks</option>
                                <option value="months" @selected(old('period_type') == 'months')>Months</option>
                            </select>
                            @error('period_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="soon" @selected(old('status') == 'soon')>Soon</option>
                                <option value="active" @selected(old('status') == 'active')>Active</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount') }}">
                            @error('discount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="free_trial" class="form-label">Free Trial</label>
                            <select class="form-control @error('free_trial') is-invalid @enderror" id="free_trial" name="free_trial">
                                <option value="1" @selected(old('free_trial') == '1')>Yes</option>
                                <option value="0" @selected(old('free_trial') == '0')>No</option>
                            </select>
                            @error('free_trial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
