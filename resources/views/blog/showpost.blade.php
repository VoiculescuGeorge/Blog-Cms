@extends('layouts.app')


@section('content')

    <div class="col-sm-8 blog-main">
        <h1>{!!$post->title!!}</h1>
        <p>{!! $post->body !!}</p>
        @if(isset($img[0]))
            <img class="img-fluid" src="http://blog.dev/storage/{{$img[0]}}" alt="Image" style="width:200px; height: 200px;">
            <hr>
        @endif

    </div>

@endsection