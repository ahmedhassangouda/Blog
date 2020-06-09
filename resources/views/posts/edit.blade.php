@extends('layouts.app')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Post
                </div>

                <div class="card-body">
                    <form action="{{Route('posts.update' , $post->id)}}" method="post" enctype= multipart/form-data>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Post Title: </label>
                            <input 
                            type="text" 
                            name="title" 
                            class="form-control" 
                            placeholder="Write Post Title" 
                            value='{{$post->title}}'
                            required
                            >
                            @error('title')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Description: </label>
                            <textarea 
                            name="description" 
                            class="form-control" 
                            rows="3" 
                            placeholder="Write Post Description" 
                            value=''
                            required
                            >
                                {{$post->description}}
                            </textarea>
                            @error('description')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Content: </label>
                            <textarea 
                            name="content" 
                            class="form-control" 
                            rows="3" 
                            placeholder="Write Post Content" 
                            value=''
                            required
                            >
                                {{$post->content}}
                            </textarea> 
                            @error('content')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <img src="{{asset('storage/'.$post->image)}}" class="img-fluid my-3" alt="{{$post->title}}" style="width:100%">
                        <div class="form-group">
                            <input 
                            type="submit" 
                            class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
