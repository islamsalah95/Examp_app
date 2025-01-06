@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Subject/Create</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('subject.store') }}" method="POST" class="browser-default-validation">
                        @csrf

                        <!-- Name-->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Pricing -->
                        <div class="mb-3">
                            <label for="pricing_plans" class="form-label">Pricing Plans</label>
                            <select name="pricing_plans[]" id="pricing_plans" class="form-control" multiple>
                                @foreach($pricingPlans as $plan)
                                    <option value="{{ $plan->id }}" 
                                        @if(isset($subject) && $subject->pricingPlans->contains($plan->id)) selected @endif>
                                        {{ $plan->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        



                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12" style="display: flex; justify-content: center;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
