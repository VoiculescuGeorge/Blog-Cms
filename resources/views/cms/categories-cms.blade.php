@extends('home-cms')

@section('content')
    <div class="col-md-4" style="font-size: 1.5rem;">
        <h1>Category Tree</h1>
        {!! $html !!}
    </div>
    <div class="col-md-4">
        <h1>Delete a category</h1>

        <form action="/admin/categories/delete" method="post" >

            {{csrf_field()}}

            <select class="custom-select" name="categorie[]">
                <option selected>Select which category to delete</option>
                @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>

            <div class="form-control" style="border-style: none;">
                <button type="submit" class="btn btn-default btn-primary">Delete category</button>
            </div>
        </form>

    </div>

    <div class="col-md-4">
        <h1>Insert a category</h1>

        <form action="/admin/categories/insert" method="post" >

            {{csrf_field()}}

            <div class="form-group">
                <label for="name"><h3>Category name</h3></label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <select class="custom-select" name="categorie">
                <option selected>Select where to insert this category to delete</option>
                    <option value="0">Add Main Categorie</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <div class="form-control" style="border-style: none;">
                <button type="submit" class="btn btn-default btn-primary">Insert category</button>
            </div>
            @include('cms.errors')
        </form>

    </div>
@endsection
