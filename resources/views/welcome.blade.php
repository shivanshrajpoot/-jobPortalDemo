@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="title m-b-md">
                Looking For Jobs ?
            </div>
            <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="form-group row ml-5">
                    <div class="col-md-8 mb-2">
                        <input id="search" type="search" class="form-control{{ $errors->has('search') ? ' is-invalid' : '' }}" name="search" value="{{ old('search') }}" placeholder="{{ __('Search For Jobs...') }}" required autofocus>
                        @if ($errors->has('search'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('search') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4 ">
                        <button class="btn btn-info" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection