@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Available Jobs...</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($jobs))
                    @csrf
                       @foreach ($jobs as $job)
                           @include('layouts.partials.job')
                       @endforeach
                    @else
                       <div class="jumbotron">
                           <h2>No Jobs Found...</h2>
                           <p>Try a different keyword</p>
                       </div>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
