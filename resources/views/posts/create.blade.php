@extends('layouts.app')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add New Post
                </div>

                <div class="card-body">
                    <form action="{{Route('posts.store')}}" method="post" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label>Post Title: </label>
                            <input type="text" name="title" class="form-control" placeholder="Write Post Title">
                            @error('title')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Description: </label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Write Post Description"></textarea>
                            @error('description')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Content: </label>
                            <textarea name="content" class="form-control" rows="3" placeholder="Write Post Content"></textarea> 
                            @error('content')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Image: </label>
                            <input type="file" name="image" class="form-control-file">
                            @error('image')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
