@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        {{-- <div class="alert alert-danger">{{$error}}</div> --}}
        {{-- {{Toastr::error($error,'Error');}} --}}
        {{Toastr::error($error, 'Post not added successfully :(', ["positionClass" => "toast-top-right"]);}}
    @endforeach
@endif

@if (session('success'))
    {{-- <div class="alert alert-success">{{session('success')}}</div> --}}
    {{-- {{Toastr::success('Post added successfully :)','Success');}} --}}
    {{Toastr::success('success', 'Post added successfully :)', ["positionClass" => "toast-top-right"]);}}
@endif

@if (session('error'))
    {{-- <div class="alert alert-danger">{{session('error')}}</div> --}}
    {{-- {{Toastr::error('Post not added successfully :(','error');}} --}}
    {{Toastr::error('error', 'Post not added successfully :(', ["positionClass" => "toast-top-right"]);}}
@endif
