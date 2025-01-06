@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Mood/Edit</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('mood.update', $mood->id) }}" method="POST" class="browser-default-validation">
                        @csrf
                        @method('PUT') <!-- Laravel method directive for updating -->

                        <!-- Name-->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" 
                                   value="{{ old('name', $mood->name) }}" 
                                   placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
