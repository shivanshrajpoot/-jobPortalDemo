@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" >
                <div class="card-header">
                    <h3>{{$job->title}}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text text-wrap">{{$job->description}}</p>
                    @if(count($job->applications))
                        <h5 class="card-subtitle mb-2 text-muted">Job Applicants...</h5>
                        <table class="table table-striped table-responsive ml-5"> 
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Applied By</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($job->applications as $k => $j)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$j->user->name}}</td>
                                        <td>{{$j->user->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5>No Applicants Found...</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
