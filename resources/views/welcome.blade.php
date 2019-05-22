@extends('layouts.app')

@section('content')
    <ul>
        @foreach($travel as $travels)
            <li>
                <a href="/travels/{{$travels->id}}">
                    {{$travels->title}}
                </a>
            </li>
        @endforeach
        <li><a href="/user/"> Jelentkezés</a></li>
    </ul>
@endsection