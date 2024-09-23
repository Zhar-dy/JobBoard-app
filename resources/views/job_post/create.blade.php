@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Job Post') }}</div>
                <div class="card-body">

                    <div class="card-body">
                        <form action="{{ route('jobpost.store')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Job Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description"
                                        class="form-control"name="description" required autocomplete="description" rows="5"
                                        cols="50">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Catergory') }}</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-select" aria-label="Default select example">
                                        <option value="IT">{{ __('Information Technology') }}</option>
                                        <option value="Medical">{{ __('Medical') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="location"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <select name="location" class="form-select" aria-label="Default select example">
                                        <option value="Selangor">{{ __('Selangor') }}</option>
                                        <option value="Beijing">{{ __('Beijing') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="salary"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Expected Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="number" class="form-control" name="salary"
                                        value="{{ old('salary') }}" required autocomplete="salary">
                                </div>
                            </div>

                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                        <a href="{{ route('home')}}" class="btn btn-secondary">{{__('Back')}}</a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection