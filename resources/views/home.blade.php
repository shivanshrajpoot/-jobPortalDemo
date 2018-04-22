@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{Auth::user()->role ? 'Previous Job Applications...' : 'Create A New Job...'}}</h1>
                    @if(!Auth::user()->role)
                        <a class="btn btn-success pull-right" href="{{ route('createJob') }}">Create New</a>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($jobs))
                        <h5 class="card-subtitle mb-2 text-muted">
                            {{Auth::user()->role ? 'Jobs You Have Applied To... ' : 'Jobs You Posted earlier... '}}
                        </h5>
                        <table class="table table-striped table-responsive ml-1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>{{Auth::user()->role ? 'Applied On' : 'Applications' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $k => $job)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{ Auth::user()->role ? $job->job->title : $job->title }}</td>
                                        <td>{{ Auth::user()->role ? $job->job->description : $job->description }}</td>
                                        @if(Auth::user()->role)
                                            <td>{{$job->created_at->toFormattedDateString()}} ({{$job->created_at->diffForHumans()}})</td>
                                        @else
                                            <td><a href="{{url('/job/'.$job->id)}}">View Applicants</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5 class="card-subtitle mb-2 text-muted">
                            No Records...
                        </h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
