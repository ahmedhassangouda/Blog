@extends('layouts.app')

@section('content')                  
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Categories
                    <a class="btn btn-sm btn-success float-right" href="{{Route('categories.create')}}"><i class="fa fa-plus"></i> Add Category</a>
                </div>                
                <div class="card-body">                  
                  @if(Session::has('success'))
                  <div class="row justify-content-center">
                    <div class="col-md-8">                    
                      <div class="alert alert-success text-center">{{Session::get('success')}}</div>
                    </div>
                  </div>
                  @endif
                    <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Controls</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                          <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                              <form action="{{Route('categories.destroy' , $category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{Route('categories.edit' , $category->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
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
