@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts)>0)
        <div class="row">
            @foreach ($posts as $listPost)
                <div class="card" style="width: 17.1rem;margin: 5px;">
                    {{-- <span>Image Preview</span> --}}
                    @if ($listPost->post_img)
                        <img class="card-img-top img-size" src="{{asset('storage/posts_images'.$listPost->post_img)}}" alt="{{$listPost->title}}" srcset="">
                    @else
                        <img class="card-img-top img-size" src="{{asset('storage/posts_images/default.jpg')}}" alt="{{$listPost->title}}" srcset="">
                    @endif
                    {{-- <img class="card-img-top img-size" src="posts_images/{{$listPost->post_img}}" alt="{{$listPost->title}}"> --}}
                    {{-- <img class="card-img-top img-size" src="{{asset('storage/posts_images'.$listPost->post_img)}}" alt="{{$listPost->title}}"> --}}
                    <div class="card-body">
                        <h5 class="card-title"><a href="/posts/{{$listPost->id}}">{{$listPost->title}}</a></h5>
                        <p class="card-text">{!!substr(strip_tags($listPost->description), 0, 150)!!}</p>
                        <hr>
                        <small>{{$listPost->created_at}}</small><br>
                        <small>By: {{$listPost->user->name}}</small><br>
                        <a href="/posts/{{$listPost->id}}" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            @endforeach
            <hr>
            <div class="container-fluid">
                <div class="d-flex justify-content-center mt-n1">
                    {{$posts->links();}}
                </div>
            </div>
        </div>
    @else
        <p>Not blog found</p>
    @endif
@endsection
