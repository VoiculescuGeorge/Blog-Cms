<nav class="col-sm-3 col-md-2 hidden-xs-down bg-light sidebar">

    <ul class="nav nav-pills flex-column ">
        <li class="nav-item">
            <a class="nav-link"href="{{ route('admin-posts') }}">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-newpost') }}">New Post</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-categories') }}">Categories</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-upload') }}">Upload Files</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-users') }}">Users</a>
        </li>
    </ul>
</nav>
