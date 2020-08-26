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
