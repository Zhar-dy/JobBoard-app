@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Job Application') }}</div>
                <div class="card-body">

                    <div class="card-body">
                        <form action="{{ route('jobapp.update', [$jobpost->id, $jobapp->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="job_post_id" value="{{$jobpost->id}}">
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name')}}</label>

                                <div class="col-md-6">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{Auth::user()->name}}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Resume Picture') }}</label>
                                <div class="col-md-6">
                                        <input class="form-control" type="file" name="resume">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cover Letter') }}</label>

                                <div class="col-md-6">
                                <textarea id="description"
                                        class="form-control"name="cover_letter" required autocomplete="description" rows="5"
                                        cols="50"></textarea>
                                </div>
                            </div>
                    </div>

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
