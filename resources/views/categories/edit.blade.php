@extends('layouts.app')
@section('sidebar')
    @include('layouts.admin-side-bar')
@endsection
@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Edit Category 
                </div>

                <div class="card-body">
                    <form action="{{Route('categories.update' , $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Category Name: </label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="Write Category Name"
                                value="{{$category->name}}"
                                required
                            >        
                        </div>
                        @error('name')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <button class="btn btn-success float-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
