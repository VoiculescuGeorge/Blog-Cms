@extends('home-cms')

@section('content')
    <link rel="stylesheet" href="{{asset('css/edit.css') }}" />

    <h1>Create a post</h1>

    <form action="/admin/new-post" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <div class="form-group">
           <label for="title"> <h2>Post Title</h2></label>
            <input type="text" class="form-control editor" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="body"><h2>Post Body</h2></label>
            <textarea name="body" id="body" class="form-control editor"></textarea>
        </div>

        <div class="form-group">
            <input type="file" name="photos" />
        </div>

        <div class="form-group">
            <select class="custom-select" name="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control" style="border-style: none;">
            <button type="submit" class="btn btn-default btn-primary">Publish</button>
        </div>

        @include('cms.errors')

    </form>

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
