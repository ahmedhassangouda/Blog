@extends('layouts.app')
@section('sidebar')
    @include('layouts.admin-side-bar')
@endsection
@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Posts
                    <div class="float-right">
                      <a class="btn btn-sm btn-success " href="{{Route('posts.create')}}"><i class="fa fa-plus"></i> Add Post</a> 
                      <a class="btn btn-sm btn-warning  " href="{{Route('posts.create')}}"><i class="fa fa-clock-o"></i> Pending Post</a>                     
                      @if (auth()->user()->isAdmin())
                      <a class="btn btn-sm btn-danger " href="{{Route('posts.trashed')}}"><i class="fa fa-trash"></i> Trashed Posts</a>
                      @endif
                    </div>
                    
                </div>

                <div class="card-body">
                  @if(Session::has('success'))
                  <div class="row justify-content-center">
                    <div class="col-md-8">                    
                      <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                    </div>
                  </div>
                  @endif
                    <table class="table table-hover text-center">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Controls</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                            <tr>
                              <td>{{$post->title}}</td>
                              <td><img src="{{asset('storage/'.$post->image)}}" class="img-fluid" alt="{{$post->title}}" width="100px"></td>
                              <td>
                                <form action="{{Route('posts.destroy' , $post->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <a href="{{Route('posts.edit' , $post->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Trash</button>                                
                                </form>
                              </td>
                            </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
@endsection
