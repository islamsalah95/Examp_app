@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Exam/Create</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('exam.store') }}" method="POST" class="browser-default-validation">
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


                        <!-- chapters -->
                        <div class="mb-3">
                            <label for="chapter_id" class="form-label">Chapter</label>
                            <select id="chapter_id" class="form-control @error('chapter_id') is-invalid @enderror"
                                name="chapter_id">
                                <option value="">Select one</option>
                                @foreach ($chapters as $chapter)
                                    <option value="{{ $chapter->id }}" @selected(old('chapter_id') == $chapter->id)>
                                        {{ $chapter->name }}
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
                            <select id="type" class="form-control @error('type') is-invalid @enderror"
                                name="type">
                                <option value="">Select one</option>
                                    <option value="free" @selected(old('type')=='free')>
                                       Free
                                    </option>
                                    <option value="paid" @selected(old('type')=='paid')>
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
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
