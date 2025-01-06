@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Subject/Edit</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('subject.update', $subject->id) }}" method="POST"
                        class="browser-default-validation">
                        @csrf
                        @method('PUT') <!-- Required for PUT request -->

                        <!-- Name-->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $subject->name) }}" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pricing -->
                        <div class="mb-3">
                            <label for="pricing_plans" class="form-label">Pricing Plans</label>
                            <select name="pricing_plans[]" id="pricing_plans" class="form-control" multiple>
                                @foreach ($pricingPlans as $plan)
                                    <option value="{{ $plan->id }}" @if (is_array(old('pricing_plans',$subject->pricingPlans->pluck('id')->toArray())) &&
                                            in_array($plan->id, old('pricing_plans',$subject->pricingPlans->pluck('id')->toArray()))) selected @endif>
                                        {{ $plan->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12" style="display: flex; justify-content: center;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
