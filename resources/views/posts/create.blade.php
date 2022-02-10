@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title');}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']);}}
        </div><br>
        <div class="form-group">
            {{Form::label('description', 'Description');}}
            {{Form::textarea('description', '', ['id'=>'body','class' => 'form-control', 'placeholder' => 'Description']);}}
        </div><br>
        {{-- <div class="form-group">
            {{Form::label('post_img', 'Image URL');}}
            {{Form::text('post_img', '', ['class' => 'form-control', 'placeholder' => 'https://']);}}
        </div> --}}
        <div class="form-group">
            {{Form::label('post_img', 'Image');}}
            {{Form::file('post_img', ['class' => 'form-control'])}}
        </div>
        <br>
        {{Form::submit('Submit', ['class' => 'btn btn-primary p-10'])}}
    {!! Form::close() !!}
@endsection
