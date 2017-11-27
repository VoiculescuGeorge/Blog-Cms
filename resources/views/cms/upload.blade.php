@extends('home-cms')

@section('content')
    <div class="row">

        <div class="col-md-3">
            @include('cms.errors')

            <form action="/admin/upload" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title"> <h2>Image Name</h2></label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <input type="file" class="form-control" id="file" name="photos[]" multiple>
                </div>

                <div class="form-control" style="border-style: none;">
                    <button type="submit" class="btn btn-default btn-primary" value="Upload">Upload</button>
                </div>
            </form>

            <form action="/admin/upload/delete" method="post">
                {{csrf_field()}}

                <select class="custom-select" name="categorie[]">
                    <option selected>Select which image to delete</option>
                    @foreach($img as $imgs)
                        <option value="{{$imgs->filename}}">{{$imgs->filename}}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-default btn-primary">Delete Picture!</button>
                @include('cms.errors')
            </form>
        </div>

        <div class="col-md-8" >
            @foreach($img as $imgs)
                <div class="card" style="width: 20%; height: 100px; display: inline-flex;">
                    <img class="img-fluid" src="http://blog.dev/storage/{{$imgs->filename}}" alt="Image">
                </div>
            @endforeach
        </div>
    </div>

@endsection
