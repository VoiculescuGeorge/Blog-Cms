@extends('home-cms')

@section('content')

    @foreach($posts as $post)
        @include('cms.post')
    @endforeach

@endsection