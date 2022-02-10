@extends('layouts.app')

@section('content')
            <h1>{{$title}}</h1>
            @if($services > 0)
                <ul>
                    @foreach($services as $listServices)
                        <li>{{$listServices}}</li>
                    @endforeach
                </ul>
            @endif
            <p>These are the services we do using this test web application using Laravel framework.</p>
@endsection
