@extends('layouts.app')

@section('content')
    <small>{{$detailPost->created_at}}</small> | <small class="float-end">By: {{$detailPost->user->name}}</small>
    <hr>
    <div class="row">
        <div class="col-md-6">
            {{-- <img class="img-fluid single-post-img" src="{{$detailPost->post_img}}" alt="{{$detailPost->title}}" srcset=""> --}}
            <img class="img-fluid single-post-img" src="{{asset('storage/posts_images'.$detailPost->post_img)}}" alt="{{$detailPost->title}}" srcset="">

        </div>
    {{-- <hr> --}}
        <div class="col-md-6">
            <h1>{{$detailPost->title}}</h1>
            <p>{!!$detailPost->description!!}</p>
            <hr>
            @if(!Auth::guest())
                @if (Auth::id() == $detailPost->user->id)
                    {{-- <a href="/posts/{{$detailPost->id}}/edit" class="btn btn-primary">Edit</a>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $detailPost->id],'method' => 'POST', 'class' => 'float-end'])!!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger float-end'])}}
                    {!!Form::close()!!} --}}
                    <a href="/posts/{{$detailPost->id}}/edit" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                    {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $detailPost->id],'method' => 'POST', 'class' => 'float-end'])!!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {{-- {{Form::submit('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger float-end'])}} --}}
                        {{ Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger float-end', 'type' => 'submit', 'title' => 'Delete']) }}
                    {!!Form::close()!!}
                @endif
            @endif

        </div>
    </div>

@endsection
