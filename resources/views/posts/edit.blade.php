@extends('layouts.app')
@section('sidebar')
    @include('layouts.admin-side-bar')
@endsection
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
                        <div class="form-group">
                            <label>Post Category: </label>
                            <select name="category_id" class="form-control" placeholder="Select Post Category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select> 
                            @error('category_id')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Post Category: </label>
                            <select name="tags[]" class="form-control" placeholder="Select Post Tags" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" @if($post->hasTag($tag->id)) selected @endif>{{$tag->name}}</option>
                                @endforeach
                            </select> 
                            @error('tags')
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
