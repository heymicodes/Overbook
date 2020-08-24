@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add book to the library') }}</div>
                <form method="POST" action="{{ route('books.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="summary" class="col-md-4 col-form-label text-md-right">{{ __('summary') }}</label>

                        <div class="col-md-6">
                            <input id="summary" type="text-area" class="form-control @error('summary') is-invalid @enderror" name="summary" value="{{ old('summary') }}" required autofocus>

                            @error('summary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ISBN" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>

                        <div class="col-md-6">
                            <input id="ISBN" type="text" class="form-control @error('ISBN') is-invalid @enderror" name="ISBN" value="{{ old('ISBN') }}" required autofocus>

                            @error('ISBN')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="publication_date" class="col-md-4 col-form-label text-md-right">{{ __('publication_date') }}</label>

                        <div class="col-md-6">
                            <input id="publication_date" type="text" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date') }}" required autofocus>

                            @error('publication_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add book') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
