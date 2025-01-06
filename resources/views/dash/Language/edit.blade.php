@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('languages/edit.main_titel') }}/</span>{{ __('languages/edit.sub_titel') }}
@endsection

@section('content')
    <div class="container">
        <h1 style="direction:{{ getDirection() }};">{{ __('languages/edit.Language_Translations_Page') }} ({{$slug}})</h1>

        <form action="{{ route('languages.update', ['locale' => getCurrentLocale(),'key' => $key, 'language' => $language, 'slug' => $slug]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="value">{{ __('languages/edit.Translation_for') }}: <strong>{{ $key }}</strong></label>
                <textarea name="value" id="value" class="form-control" rows="5" required>{{ $value }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">{{ __('languages/edit.Save') }}</button>
            <a href="{{ router('languages.index', ['key' => $key, 'language' => 'en']) }}" class="btn btn-secondary">{{ __('languages/edit.Cancel') }}</a>
        </form>
    </div>
@endsection
