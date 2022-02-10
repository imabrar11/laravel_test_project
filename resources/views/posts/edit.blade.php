@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$posts->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title');}}
            {{Form::text('title', $posts->title, ['class' => 'form-control', 'placeholder' => 'Title']);}}
        </div><br>
        <div class="form-group">
            {{Form::label('description', 'Description');}}
            {{Form::textarea('description', $posts->description, ['id'=>'body','class' => 'form-control', 'placeholder' => 'Description']);}}
        </div><br>
        {{-- <div class="form-group">
            {{Form::label('post_img', 'Image URL');}}
            {{Form::text('post_img', $posts->post_img, ['class' => 'form-control', 'placeholder' => 'https://']);}}
        </div> --}}
        <div class="form-group">
            {{Form::label('post_img', 'Image');}}
            {{Form::file('post_img', ['class' => 'form-control'])}}
        </div>
        <br>
        <div class="form-group">
            <span>Image Preview</span>
            @if ($posts->post_img)
                <img class="img-fluid single-post-img" src="{{asset('storage/posts_images'.$posts->post_img)}}" alt="{{$posts->title}}" srcset="" width="300" height="300">
            @else
                <img class="img-fluid single-post-img" src="{{asset('storage/posts_images/default.jpg')}}" alt="{{$posts->title}}" srcset="" width="300" height="300">
            @endif
        </div>
        <br>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-primary p-10'])}}
    {!! Form::close() !!}
@endsection
