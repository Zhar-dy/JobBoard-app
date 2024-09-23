@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('Job Name: ')}}{{ $jobpost->name }}</h1> <a href="{{ route('home')}}" class="btn btn-primary">{{__('Back')}}</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant's Name</th>
                <th>Resume Picture</th>
                <th>Cover Letter</th>
                <th>Status</th>
                @if (Auth::user()->role == 'client')
                <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($jobapps as $key => $jobapp)
            @can('validjobapp', [$jobapp,$jobpost])
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$jobapp->name}}</td>
                <td><img src="{{ asset('storage/jobapp/' . $jobapp->resume) }}" alt="Applicant Resume"></td>
                <td><p class="textbox" style="height: 100px; overflow-y: scroll;">{{$jobapp->cover_letter}}
                </p></td>
                @if (Auth::user()->role == 'commissioner' || (Auth::user()->role == 'admin'&&Auth::id() !== $jobpost->user_id))
                <td>{{$jobapp->status}}</td>
                @elseif(Auth::id() == $jobpost->user_id)
                <form method="POST" action="{{ route('jobapp.update',['jobpost' => $jobpost->id, 'jobapp' => $jobapp->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="job_post_id" value="{{ $jobpost->id }}">
                    <td>
                        <select name="status" class="form-select" aria-label="Default select example">
                            <option value="accepted" {{ $jobapp->status == 'accepted' ? 'selected' : '' }}>{{ __('Accepted') }}</option>
                            <option value="rejected"{{ $jobapp->status == 'rejected' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                        </select>
                    </td>

                    <td><button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button></td>
                    </form>
                @endif
            </tr>
            @endcan
            @endforeach
        </tbody>
    </table>
</div>
@endsection
