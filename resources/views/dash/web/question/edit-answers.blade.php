@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">Question/Edit/</span>Answers
@endsection

@section('content')
    <div class="container mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg">
                <div class="card-body">
                    <!-- Error Display -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>{{ __('roles/create.alerts.whoops') }}</strong>
                            {{ __('roles/create.alerts.input_problems') }}
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Start -->
                    <form action="{{ route('question.updateAnswers', ['question' => $question->id]) }}" method="POST"
                        class="needs-validation" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Dynamically Rendered Answers -->
                        @foreach (['a', 'b', 'c', 'd', 'e'] as $key)
                            <div class="mb-4">
                                <h5 class="text-primary">Answer {{ strtoupper($key) }}</h5>

                                <!-- Text Input -->
                                <div class="mb-3">
                                    <label for="answer_{{ $key }}" class="form-label">Answer Text</label>
                                    <input type="text" id="answer_{{ $key }}"
                                        class="form-control @error('answer_{{ $key }}') is-invalid @enderror"
                                        name="answer_{{ $key }}"
                                        value="{{ old('answer_' . $key, $question->answers[$loop->index]->answer_text ?? '') }}"
                                        placeholder="Enter answer {{ strtoupper($key) }}">
                                    @error('answer_{{ $key }}')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


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
                                                            src="{{ $question->answers[$loop->index]->getFirstMediaUrl('answers') ?? '' }}"
                                                            alt="{{ __('admins/profile.profile_image_alt') }}">
                                                    </div>
                                                </div>
                                                <div class="fallback">
                                                    <input type="file" class="form-control" name="img_{{ $key }}"
                                                    id="imageUpload_{{ $key }}">
                                                </div>
                                                <div id="imagePreview" style="margin-top: 20px; text-align: center;"></div>
                                            </div>
                                            @error("img_{{ $key }}")
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description_{{ $key }}" class="form-label">Description</label>
                                    <textarea id="description_{{ $key }}"
                                        class="form-control @error('description_{{ $key }}') is-invalid @enderror"
                                        name="description_{{ $key }}" placeholder="Add description">{{ old('description_' . $key, $question->answers[$loop->index]->description ?? '') }}</textarea>
                                    @error("description_{{ $key }}")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <!-- Correct Answer -->
                        <div class="mb-4">
                            <h5 class="text-primary">Correct</h5>

                            <label for="correct_answer" class="form-label">Correct Answer</label>
                            <select id="correct_answer" class="form-select @error('correct_answer') is-invalid @enderror"
                                name="correct_answer">
                                <option value="" selected disabled>Select the correct answer</option>
                                @foreach (['a', 'b', 'c', 'd', 'e'] as $key)
                                    <option value="answer_{{ $key }}" @selected(old('correct_answer', $question->answers[$loop->index]->is_correct ?? false))>
                                        {{ strtoupper($key) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('correct_answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- Form End -->

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
            .create(document.querySelector('#description_a'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#description_b'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#description_c'))
            .catch(error => {
                console.error(error);
            });


        ClassicEditor
            .create(document.querySelector('#description_d'))
            .catch(error => {
                console.error(error);
            });


        ClassicEditor
            .create(document.querySelector('#description_e'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
