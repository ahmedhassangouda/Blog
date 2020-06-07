@extends('layouts.app')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add New Post
                </div>

                <div class="card-body">
                    <form action="{{Route('posts.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Post Name: </label>
                            <input type="text" name="name" class="form-control" placeholder="Write Post Name">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
