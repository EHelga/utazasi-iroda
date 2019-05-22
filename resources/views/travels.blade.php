@extends('layouts/app', ['siteTitle' => $travels->content])

@section('content')
    <div class="container" style="font-family:Times; color:rgba(10,42,65.9);">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 lead">{{ $travels->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11" style="color:rgb(18,67,93);">
                <h2>Travel day: {{ $travels->datestart }}</h2>
                <h2>Finish day: {{ $travels->dateend }}</h2>
                <h2>Max number of people: {{ $travels->maxnumber }}</h2>
                <h2>Current headcount: {{ $userCount }}</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-8">
                <h3>
                    Description:
                </h3>
                <p>{!! nl2br(e($travels->content)) !!}</p>
            </div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('cancel'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('cancel') }}
            </div>
        @endif

        @if(Auth::user() != NULL)
            @if($travels->id != Auth::user()->travelId)
                @if($userCount < $travels->maxnumber)
                    <form method="POST" action="/joinTravel/{{ $travels->id }}">
                        {{ csrf_field() }}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-dark">
                                    Apply
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-warning" role="alert">
                        It's full!
                    </div>
                @endif
            @else
                <form method="POST" action="/resignTravel/{{ $travels->id }}">
                    {{ csrf_field() }}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-dark">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        @else
            <div class="alert alert-warning" role="alert">
                Please <a href="{{ route('login') }}">sign in</a> or <a href="{{ route('register') }}">registrate</a>!
            </div>
        @endif

    </div>

@endsection