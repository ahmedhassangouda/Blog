@extends('layouts.app')

@section('content')                  
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tags
                    <a class="btn btn-sm btn-success float-right" href="{{Route('tags.create')}}"><i class="fa fa-plus"></i> Add Tag</a>
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
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Controls</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($tags as $tag)
                          <tr>
                            <td>
                              {{$tag->name}}<span class="badge badge-primary mx-2">{{ $tag->posts->count() }}</span>
                            </td>
                            <td>{{$tag->created_at}}</td>
                            <td>
                              <form action="{{Route('tags.destroy' , $tag->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{Route('tags.edit' , $tag->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>                                
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
