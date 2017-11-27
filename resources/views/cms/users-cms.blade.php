@extends('home-cms')

@section('content')
<h2>All Users</h2>

<form action="/admin/users" method="get">
    {{csrf_field()}}
    <input type="text" class="form-control" id="title" name="name" placeholder="Search user name">
    <button type="submit" class="btn btn-default btn-primary">Filter</button>
</form>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
             @foreach($users as $user)
                 <tr>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->role}}</td>
                     <td>
                        <form action="/admin/users/admin/{{$user->id}}" method="post">
                            {{csrf_field()}}
                                <button type="submit" class="btn btn-default btn-primary">Make admin!</button>
                        </form>
                         <form action="/admin/users/user/{{$user->id}}" method="post">
                             {{csrf_field()}}
                             <button type="submit" class="btn btn-default btn-primary">Make user!</button>
                         </form>
                     </td>
                 </tr>
             @endforeach
             @include('cms.errors')
        </tbody>
    </table>
</div>
@endsection
