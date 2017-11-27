@extends('home-cms')

@section('content')

    <link rel="stylesheet" href="{{asset('css/edit.css') }}" />

    <div class="col-sm-8 blog-main">
        <h1>Edit this post</h1>

        <form action="/admin/posts/edit/{{$post->id}}" method="post" >

            {{csrf_field()}}

            <div class="form-group">
                <label for="title"><h2>Post title</h2></label>
                <input type="text" class="form-control editor" id="title" name="title" value="{{$post->title}}" style="">
            </div>

            <div class="form-group">
                <label for="body"><h2>Post body</h2></label>
                <textarea name="body" id="body" class="form-control editor">{{$post->body}}</textarea>
            </div>

            @if(isset($post->image->filename))

                <div class="form-group">
                    <select class="custom-select" name="category">
                        <option selected>Select Image for this post</option>
                        @foreach($images as $image)
                            <option value="{{$image->id}}">{{$image->filename}}</option>
                        @endforeach
                    </select>
                </div>

            @endif

            @if(isset($categories))
            <div class="form-group">
                <select class="custom-select" name="category">
                    <option selected>Select Category for this post</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="form-control" style="border-style: none;">
                <button type="submit" class="btn btn-default btn-primary">Edit Post</button>
            </div>

        </form>

    </div>
    <script>
        $(document).ready(function(){
            $(".editor").jqte();
        });

        // settings of status
        var jqteStatus = true;
        $(".status").click(function () {
            jqteStatus = jqteStatus ? false : true;
            $('.jqte-test').jqte({ "status": jqteStatus })
        });
    </script>
@endsection