@extends('layouts.app')

@section('content')
<style>
.textbox {
    font-size: 18px;
    color: #555;
    "padding: 15px;
border: 1px solid #ccc;
    background-color: #F4EEFF;
    text-indent: 10px;
    border-radius: 8px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Job Application detail') }}</div>
                <div class="card-body">

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <p class="textbox">{{$jobapp->name}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status"
                                class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                            <p class="textbox">{{$jobapp->status}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('Resume') }}</label>

                            <div class="col-md-6">
                                <a href="{{ asset('storage/jobapp/' . Auth::user()->resume) }}" target="_blank">{{ Auth::user()->resume }}</a>
                                <img src="{{ asset('storage/jobapp/' . $jobapp->resume) }}" alt="Applicant Resume">

                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('Cover Letter') }}</label>

                                <div class="col-md-6">
                                <p class="textbox" style="height: 100px; overflow-y: scroll;">{{$jobapp->cover_letter}}
                                </p>
                            </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('home')}}" class="btn btn-secondary">{{__('Back')}}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
