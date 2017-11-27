<div class="blog-post">

    <div class="blog-post-title">
        <a href="/admin/posts/edit/{{$post->id}}">
            {{ strip_tags($post->title) }}
        </a>
        Created on {{$post->created_at->toFormattedDateString()}}
        and last updated on {{$post->updated_at->toFormattedDateString()}}
        <hr>
    </div>
    <form action="/admin/posts/delete/{{$post->id}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="btn btn-default btn-primary">Delete Post!</button>
        @include('cms.errors')
    </form>
</div>

