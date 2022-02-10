<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Image;
use Intervention\Image\Exception\NotReadableException;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(4);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'post_img' => 'image|nullable|max:2048'
        ]);

        if ($request->hasfile('post_img')) {
            $file = $request->file('post_img');

            $img2 = Image::make($file);

            $extension = $file->guessExtension(); // getting image extension

            $filename = 'Img_' . time() . '.' . $request->title . '.' . $extension;

            $img2->save(public_path() . '/storage/posts_images' . $filename);
        } else {
            $filename = 'default.jpg';
        }


        // if ($request->hasFile('post_img')) {

        //     $name = $request->file('post_img')->getClientOriginalName();

        //     $fileName = pathinfo($name, PATHINFO_FILENAME);

        //     $extension = $request->file('post_img')->getClientOriginalExtension();

        //     $fileNameToSave = $fileName . '_' . time() . '.' . $extension;

        //     $path = $request->file('posts_img')->store('public/posts_images', $fileNameToSave);
        // } else {
        //     $fileNameToSave = 'default.jpg';
        // }

        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->description = $request->input('description');
        $posts->user_id = auth()->user()->id;
        $posts->post_img = $filename;
        $posts->save();
        Toastr::success('success', 'Post added successfully :)', ["positionClass" => "toast-top-right"]);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPost = Post::find($id);
        return view('posts.singlepost')->with('detailPost', $detailPost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts.edit')->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'post_img' => 'image|nullable|max:2048'
        ]);

        if ($request->hasfile('post_img')) {
            $file = $request->file('post_img');

            $img2 = Image::make($file);

            $extension = $file->guessExtension(); // getting image extension

            $filename = 'Img_' . time() . '.' . $request->title . '.' . $extension;

            $img2->save(public_path() . '/storage/posts_images' . $filename);
        }

        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->description = $request->input('description');
        if ($request->hasfile('post_img')) {
            $posts->post_img = $filename;
        }
        $posts->save();
        Toastr::success('success', 'Post updated successfully :)', ["positionClass" => "toast-top-right"]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        Toastr::success('success', 'Post deleted successfully :)', ["positionClass" => "toast-top-right"]);
        return redirect('/posts');
    }
}
