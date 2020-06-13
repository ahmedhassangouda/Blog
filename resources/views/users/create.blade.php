@extends('layouts.app')
@section('sidebar')
    @include('layouts.admin-side-bar')
@endsection
@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   Add New Tag 
                </div>

                <div class="card-body">
                    <form action="{{Route('tags.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tag Name: </label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                placeholder="Write Tag Name"
                                required
                            >        
                        </div>
                        @error('name')
                            <div class="alert alert-danger text-center">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <button class="btn btn-success float-right"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
