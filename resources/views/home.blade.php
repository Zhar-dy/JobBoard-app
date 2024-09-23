@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form-control"
            method="GET" action="{{ route('jobpost.indexing')}}">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword" value="{{ request()->get('keyword')}}" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
            </form>
            @can('create', \App\Models\JobPost::class)
            <a href="{{ route('jobpost.create') }}" type="button" class="btn btn-primary">{{ __('Create Job') }}</a>
            @endcan
            <div class="card mt-3">
                <div class="card-header" style="background-color: rgb(50 107 165 / 20%)">
                    {{ __('IT') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Jobs</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($JobPosts as $JobPost)
                            @if ($JobPost->category == 'IT')
                            <tr>
                                <td width="25%">{{ $JobPost->name }}</td>
                                <td width="25%">{{ $JobPost->status }}</td>

                                @can('view', $JobPost)
                                <td>
                                    <a href="{{ route('jobpost.show', $JobPost) }}"
                                        class="btn btn-dark">{{ __('View Details')}}</a>
                                    <a href="{{ route('jobpost.edit', $JobPost->id) }}" type="button"
                                        class="btn btn-info">{{ __('Edit') }}</a>

                                    <form method="POST" action="{{ route('jobpost.destroy', $JobPost) }}"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>

                                    <a href="{{ route('jobapp.allshow', $JobPost) }}"
                                        class="btn btn-success">{{ __('View Applicants Details') }}</a>
                                </td>
                                @endcan

                                @cannot('view', $JobPost)
                                @can('viewdata', $JobPost)
                                <td>
                                    @foreach($JobApps as $JobApp)
                                    @if ($JobApp->job_post_id == $JobPost->id)
                                    @can('idjob', $JobApp)
                                    <a href="{{ route('jobpost.show', [$JobPost->id, $JobApp->id]) }}"
                                        class="btn btn-dark">{{ __('View Job Details') }}</a>
                                    <a href="{{ route('jobapp.edit' , [$JobPost->id, $JobApp->id] )}}"
                                         class="btn btn-dark">{{__('Edit Application')}}</a>
                                    <a href="{{ route('jobapp.show', [$JobPost->id, $JobApp->id]) }}"
                                        class="btn btn-dark">
                                        {{ __('View Application Info') }}
                                    </a>
                                    @endcan
                                    @endif
                                    @endforeach

                                    @if ($JobApps->where('job_post_id', $JobPost->id)->isEmpty())
                                    <a href="{{ route('jobpost.show', $JobPost->id) }}"
                                        class="btn btn-dark">{{ __('View Job Details') }}</a>
                                    @endif
                                </td>
                                @endif
                                @endcannot
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @if (request()->has('keyword') && request()->get('keyword') !== '')
                    {{ $JobPosts->appends(['keyword' => request()->get('keyword')])->links() }}
                @else
                    {{ $JobPosts->links() }} 
                @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header" style="background-color: rgb(50 107 165 / 20%)">
                    {{ __('Medical') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Jobs</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($JobPosts as $JobPost)
                            @if ($JobPost->category == 'Medical')
                            <tr>
                                <td width="25%">{{ $JobPost->name }}</td>
                                <td width="25%">{{ $JobPost->status }}</td>

                                @can('view', $JobPost)
                                <td>
                                    <a href="{{ route('jobpost.show', $JobPost) }}"
                                        class="btn btn-dark">{{ __('View Details')}}</a>
                                    <a href="{{ route('jobpost.edit', $JobPost->id) }}" type="button"
                                        class="btn btn-info">{{ __('Edit') }}</a>

                                    <form method="POST" action="{{ route('jobpost.destroy', $JobPost) }}"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>

                                    <a href="{{ route('jobapp.allshow', $JobPost) }}"
                                        class="btn btn-success">{{ __('View Applicants Details') }}</a>
                                </td>
                                @endcan

                                @cannot('view', $JobPost)
                                @can('viewdata', $JobPost)
                                <td>
                                    @foreach($JobApps as $JobApp)
                                    @if ($JobApp->job_post_id == $JobPost->id)
                                    @can('idjob', $JobApp)
                                    <a href="{{ route('jobpost.show', [$JobPost->id, $JobApp->id]) }}"
                                        class="btn btn-dark">{{ __('View Job Details') }}</a>
                                    <a href="{{ route('jobapp.edit' , [$JobPost->id, $JobApp->id] )}}"
                                         class="btn btn-dark">{{__('Edit Application')}}</a>
                                    <a href="{{ route('jobapp.show', [$JobPost->id, $JobApp->id]) }}"
                                        class="btn btn-dark">
                                        {{ __('View Application Info') }}
                                    </a>
                                    @endcan
                                    @endif
                                    @endforeach

                                    @if ($JobApps->where('job_post_id', $JobPost->id)->isEmpty())
                                    <a href="{{ route('jobpost.show', $JobPost->id) }}"
                                        class="btn btn-dark">{{ __('View Job Details') }}</a>
                                    @endif
                                </td>
                                @endif
                                @endcannot
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
