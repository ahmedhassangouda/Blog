@extends('layouts.app')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Trashed Posts
                </div>

                <div class="card-body">
                  @if(Session::has('success'))
                  <div class="row justify-content-center">
                    <div class="col-md-8">                    
                      <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                    </div>
                  </div>
                  @endif
                    @if ( $posts->count() > 0)
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
                                  <a href="{{Route('posts.restor' , $post->id)}}" class="btn btn-sm btn-success"><i class="fa fa-undo"></i> Restore</a>
                                  <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Delete</button>                                
                                </form>
                              </td>
                            </tr>                            
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <div class="alert alert-danger">No Trashed Posts.</div>
                    @endif
                </div>
            </div>
        </div>
@endsection
