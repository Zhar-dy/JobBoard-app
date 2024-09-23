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
                <div class="card-header">{{ __('Edit Task') }}</div>
                <div class="card-body">

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Task Name') }}</label>

                            <div class="col-md-6">
                                <p class="textbox">{{$jobpost->name}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <p class="textbox" style="height: 100px; overflow-y: scroll;">{{$jobpost->description}}
                                </p>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('Catergory') }}</label>

                            <div class="col-md-6">
                                <p class="textbox">{{$jobpost->category}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location"
                                class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <p class="textbox">{{$jobpost->location}}</p>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="salary"
                                class="col-md-4 col-form-label text-md-end">{{ __('Salary(RM)') }}</label>

                            <div class="col-md-6">
                                <p class="textbox">{{$jobpost->salary}}</p>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('home')}}" class="btn btn-secondary">{{__('Back')}}</a>
                                @if(Auth::user()->role == 'commissioner' && Auth::id() !== $jobapp->user_id && $jobpost->status == 'approved')
                                <a href="{{ route('jobapp.create' ,$jobpost )}}" class="btn btn-dark">{{__('Apply now!')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
