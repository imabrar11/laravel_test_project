@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary float-end">New post</a>
                        <h4>Your posts</h4>
                        @if (count(array($posts))>0)
                            @foreach ($posts as $dashPost)
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                                @if ($dashPost->post_img)
                                                    <img class="img-fluid single-post-img" src="{{asset('storage/posts_images'.$dashPost->post_img)}}" alt="{{$dashPost->title}}" srcset="" width="300" height="300">
                                                @else
                                                    <img class="img-fluid single-post-img" src="{{asset('storage/posts_images/default.jpg')}}" alt="{{$dashPost->title}}" srcset="" width="300" height="300">
                                                @endif
                                                <p class="card-text"><small class="text-muted">{{$dashPost->created_at}}</small></p>
                                            {{-- <img src="{{$dashPost->post_img}}" class="img-fluid rounded-start" alt="..."> --}}
                                            {{-- <img src="{{asset('storage/posts_images'.$dashPost->post_img)}}" class="img-fluid rounded-start" alt="{{$dashPost->title}}"> --}}

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$dashPost->title}}</h5>
                                                <p class="card-text">{!!substr(strip_tags($dashPost->description), 0, 150)!!}</p>

                                                <a href="/posts/{{$dashPost->id}}/edit" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                                {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $dashPost->id],'method' => 'POST', 'class' => 'float-end'])!!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {{-- {{Form::submit('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger float-end'])}} --}}
                                                    {{ Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-danger float-end', 'type' => 'submit', 'title' => 'Delete']) }}
                                                {!!Form::close()!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5>No post added yet</h5>
                        @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    {{-- @if (count($posts)>0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $dashPost)
                                    <tr>
                                        <td>{{$dashPost->title}}</td>
                                        <td><a href="/posts/{{$dashPost->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $dashPost->id],'method' => 'POST', 'class' => 'float-end'])!!}
                                                {!! Form::hidden('_method', 'DELETE') !!}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger float-end'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h5>No post added yet</h5>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
