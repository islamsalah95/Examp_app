@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Question/Create</span>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('question.update', ['question' => $question->id]) }}" method="POST"
                        class="browser-default-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                                <img style="max-width: 300px; max-height:300px;"
                                                    src="{{ $question->getFirstMediaUrl('questions') ?? '' }}"
                                                    alt="{{ __('admins/profile.profile_image_alt') }}">
                                            </div>
                                        </div>
                                        <div class="fallback">
                                            <input type="file" name="img" id="imageUpload" />
                                        </div>
                                        <div id="imagePreview" style="margin-top: 20px; text-align: center;"></div>
                                    </div>
                                    @error('img')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- question_text -->
                        <div class="mb-3">
                            <label for="question_text" class="form-label">Question Text</label>
                            <input type="text" id="question_text"
                                class="form-control @error('question_text') is-invalid @enderror" name="question_text"
                                value="{{ old('question_text', $question->question_text) }}" placeholder="question_text">
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- description-->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" id="description" class="form-control @error('description') is-invalid @enderror"
                                name="description" placeholder="description">{{ old('description', $question->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- summary-->
                        <div class="mb-3">
                            <label for="summary" class="form-label">Summary</label>
                            <textarea type="text" id="summary" class="form-control @error('summary') is-invalid @enderror" name="summary"
                                placeholder="summary">{{ old('summary', $question->summary) }}</textarea>
                            @error('summary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- chapter_id -->
                        <div class="mb-3">
                            <label for="chapter_id" class="form-label">Chapter</label>
                            <select id="chapter_id" class="form-control @error('chapter_id') is-invalid @enderror"
                                name="chapter_id">
                                <option value="">Select one</option>
                                @foreach ($chapters as $chapter)
                                    <option value="{{ $chapter->id }}" @selected(old('chapter_id', $question->chapter_id) == $chapter->id)>
                                        {{ $chapter->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('chapter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- free_trial -->
                        <div class="mb-3">
                            <label for="free_trial" class="form-label">Free Trial</label>
                            <select id="free_trial" class="form-control @error('free_trial') is-invalid @enderror"
                                name="free_trial">
                                <option value="">Select one</option>
                                <option value="1" @selected(old('free_trial', $question->free_trial) == '1')>Yes</option>
                                <option value="0" @selected(old('free_trial', $question->free_trial) == '0')>No</option>
                            </select>
                            @error('chapter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- year-->
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" id="year" class="form-control @error('year') is-invalid @enderror"
                                name="year" value="{{ old('year', $question->year) }}" placeholder="year">
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Answers start --}}
                        <div class="mb-3">
                            <label for="answer_a" class="form-label">Answer (A)</label>
                            <input type="text" id="answer_a"
                                class="form-control @error('answer_a') is-invalid @enderror" name="answer_a"
                                value="{{ old('answer_a', $question->answers[0]->answer_text) }}" placeholder="answer a">
                            @error('answer_a')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer_b" class="form-label">Answer (B)</label>
                            <input type="text" id="answer_b"
                                class="form-control @error('answer_b') is-invalid @enderror" name="answer_b"
                                value="{{ old('answer_b', $question->answers[1]->answer_text) }}" placeholder="answer b">
                            @error('answer_b')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer_c" class="form-label">Answer (C)</label>
                            <input type="text" id="answer_c"
                                class="form-control @error('answer_c') is-invalid @enderror" name="answer_c"
                                value="{{ old('answer_c', $question->answers[2]->answer_text) }}" placeholder="answer c">
                            @error('answer_c')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer_d" class="form-label">Answer (D)</label>
                            <input type="text" id="answer_d"
                                class="form-control @error('answer_d') is-invalid @enderror" name="answer_d"
                                value="{{ old('answer_d', $question->answers[3]->answer_text) }}" placeholder="answer d">
                            @error('answer_d')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer_e" class="form-label">Answer (E)</label>
                            <input type="text" id="answer_e"
                                class="form-control @error('answer_e') is-invalid @enderror" name="answer_e"
                                value="{{ old('answer_e', $question->answers[4]->answer_text) }}" placeholder="answer e">
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
                                <option value="answer_a" @selected(old('correct_answer', $question->answers[0]->is_correct) == true)>A</option>
                                <option value="answer_b" @selected(old('correct_answer', $question->answers[1]->is_correct) == true)>B</option>
                                <option value="answer_c" @selected(old('correct_answer', $question->answers[2]->is_correct) == true)>C</option>
                                <option value="answer_d" @selected(old('correct_answer', $question->answers[3]->is_correct) == true)>D</option>
                                <option value="answer_e" @selected(old('correct_answer', $question->answers[4]->is_correct) == true)>E</option>
                            </select>
                            @error('correct_answer')
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
