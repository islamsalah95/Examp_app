@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Question/Create</span>
@endsection

@section('content')
    <div class="container mt-5">

        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="POST" class="browser-default-validation" multi
                        enctype="multipart/form-data">
                        @csrf


                        <!-- img -->
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="needsclick">
                                        <div class="dz-message needsclick">
                                            <div>
                                                {{ __('admins/profile.upload_instruction') }}
                                                <span
                                                    class="note needsclick">{{ __('admins/profile.image_only_note') }}</span>
                                            </div>
                                            <div>
                                                <img style="max-width: 300px; max-height:300px;" src="">
                                            </div>
                                        </div>
                                        <div class="fallback">
                                            <input type="file" name="img" id="imageUpload" />
                                        </div>
                                        <div id="imagePreview" style="margin-top: 20px; text-align: center;">
                                        </div>
                                    </div>
                                    @error('img')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- img -->

                        <!-- question_text-->
                        <div class="mb-3">
                            <label for="question_text" class="form-label">Question Text</label>
                            <input type="text" id="question_text"
                                class="form-control @error('question_text') is-invalid @enderror" name="question_text"
                                value="{{ old('question_text') }}" placeholder="question_text">
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- description-->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror"
                                name="description" value="{{ old('description') }}" placeholder="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- summary-->
                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary</label>
                            <textarea type="text" id="summary" class="form-control @error('summary') is-invalid @enderror" name="summary"
                                value="{{ old('summary') }}" placeholder="summary">{{ old('summary') }}</textarea>
                            @error('summary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- exam_id -->
                        <div class="mb-3">
                            <label for="exam_id" class="form-label">exams</label>
                            <select id="exam_id" class="form-control @error('exam_id') is-invalid @enderror"
                                name="exam_id">
                                <option value="">Select one</option>
                                @foreach ($exams as $exam)
                                    <option value="{{ $exam->id }}" @selected(old('exam_id') == $exam->id)>
                                        {{ $exam->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('exam_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>




                        {{-- Answers start --}}
                        <!-- Answer A-->
                        <div class="mb-3">
                            <label for="answer_a" class="form-label">Answer (A)</label>
                            <input type="text" id="answer_a"
                                class="form-control @error('answer_a') is-invalid @enderror" name="answer_a"
                                value="{{ old('answer_a') }}" placeholder="answer a">
                            @error('answer_a')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Answer B-->
                        <div class="mb-3">
                            <label for="answer_b" class="form-label">Answer (B)</label>
                            <input type="text" id="answer_b"
                                class="form-control @error('answer_b') is-invalid @enderror" name="answer_b"
                                value="{{ old('answer_b') }}" placeholder="answer b">
                            @error('answer_b')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Answer C-->
                        <div class="mb-3">
                            <label for="answer_c" class="form-label">Answer (C)</label>
                            <input type="text" id="answer_c"
                                class="form-control @error('answer_c') is-invalid @enderror" name="answer_c"
                                value="{{ old('answer_c') }}" placeholder="answer c">
                            @error('answer_c')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Answer D-->
                        <div class="mb-3">
                            <label for="answer_d" class="form-label">Answer (D)</label>
                            <input type="text" id="answer_d"
                                class="form-control @error('answer_d') is-invalid @enderror" name="answer_d"
                                value="{{ old('answer_d') }}" placeholder="answer d">
                            @error('answer_d')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Answer E-->
                        <div class="mb-3">
                            <label for="answer_e" class="form-label">Answer (E)</label>
                            <input type="text" id="answer_e"
                                class="form-control @error('answer_e') is-invalid @enderror" name="answer_e"
                                value="{{ old('answer_e') }}" placeholder="answer e">
                            @error('answer_e')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Answers End --}}


                        <!-- correct_answer -->
                        <div class="mb-3">
                            <label for="correct_answer" class="form-label">Correct Answer</label>
                            <select id="correct_answer"
                                class="form-control @error('correct_answer') is-invalid @enderror" name="correct_answer">
                                <option value="">Select one</option>
                                <option value="answer_a" @selected(old('correct_answer') == 'answer_a')>A</option>
                                <option value="answer_b" @selected(old('correct_answer') == 'answer_b')>B</option>
                                <option value="answer_c" @selected(old('correct_answer') == 'answer_c')>C</option>
                                <option value="answer_d" @selected(old('correct_answer') == 'answer_d')>D</option>
                                <option value="answer_e" @selected(old('correct_answer') == 'answer_e')>E</option>
                            </select>
                            @error('chapter_id')
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


@push('js_header')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
@endpush
@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#summary'))
            .catch(error => {
                console.error(error);
            });
    </script>

@endpush
