@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Exam/Edit</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('exam.update', $exam->id) }}" method="POST" class="browser-default-validation">
                        @csrf
                        @method('PUT') <!-- Laravel method directive for updating -->

                        <!-- Name-->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $exam->name) }}" placeholder="Name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subject -->
                        <div class="mb-3">
                            <label for="chapter_id" class="form-label">Chapter</label>
                            <select id="chapter_id" class="form-control @error('chapter_id') is-invalid @enderror"
                                name="chapter_id">
                                <option value="">Select one</option>
                                @foreach ($chapters as $chapt)
                                    <option value="{{ $chapt->id }}" @selected(old('chapter_id', $exam->chapter_id) == $chapt->id)>
                                        {{ $chapt->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('chapter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- type -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select id="type" class="form-control @error('type') is-invalid @enderror" name="type">
                                <option value="">Select one</option>
                                <option value="free"  @selected(old('type', $exam->type) == 'free')>
                                    Free
                                </option>
                                <option value="paid"  @selected(old('type', $exam->type) == 'paid')>
                                    Paid
                                </option>
                            </select>
                            @error('type')
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
