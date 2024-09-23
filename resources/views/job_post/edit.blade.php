@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Task') }}</div>
                <div class="card-body">

                    <div class="card-body">
                        <form method="POST" action="{{route('jobpost.update', $jobpost)}}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Task Name') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{$jobpost->name}}">
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
                                    <textarea id="description" class="form-control" name="description" required autocomplete="description" rows="5"
                                        cols="50">{{ old('description', $jobpost->description) }}</textarea>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Catergory') }}</label>

                                <div class="col-md-6">
                                    <select name="category" class="form-select" aria-label="Default select example">
                                        <option value="IT" @selected($jobpost->category == 'IT')>{{ __('Information Technology') }}</option>
                                        <option value="Medical" @selected($jobpost->category == 'Medical')>{{ __('Medical') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="location"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <select name="location" class="form-select" aria-label="Default select example">
                                        <option value="Selangor" @selected($jobpost->location == 'Selangor')>{{ __('Selangor') }}</option>
                                        <option value="Beijing" @selected($jobpost->location == 'Beijing')>{{ __('Beijing') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="salary"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Salary(RM)') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="number" class="form-control" name="salary"
                                        value="{{$jobpost->salary}}" required autocomplete="salary">
                                </div>
                            </div>

                            @if(Auth::user()->role == 'admin')
                            <div class="row mb-3">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Update Status') }}</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-select" aria-label="Default select example">
                                        <option value="rejected" @selected($jobpost->status === 'pending')>{{ __('Reject') }}</option>
                                        <option value="approved" @selected($jobpost->status == 'approved')>{{ __('Approve') }}</option>
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                <a href="{{ route('home')}}" class="btn btn-secondary">{{__('Back')}}</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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