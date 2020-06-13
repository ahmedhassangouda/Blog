@extends('layouts.app')
@section('sidebar')
    @include('layouts.admin-side-bar')
@endsection
@section('content')                  
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Users
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
                            <th scope="col">Avatar</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                          <tr>
                            <td>
                              <img src="{{$user->getAvatar($user->gander)}}" class="img-thumbnail" width="50px" style="border-radius: 50%">  
                            </td>
                            <td>
                              <div class="my-3">
                                <a href="{{Route('user.profile' , $user->id)}}">{{$user->name}}</a>
                              </div>
                            </td>
                            <td>
                              <form action="{{Route('user.change-role' , $user->id)}}" method="post">
                                @csrf
                                <select name="role" class="my-3">                              
                                  <option value="Admin"     @if($user->role == 'Admin')     selected @endif>Admin</option>
                                  <option value="Moderator" @if($user->role == 'Moderator') selected @endif>Moderator</option>
                                  <option value="User"      @if($user->role == 'User')      selected @endif>User</option>
                                </select>
                                <button class="btn btn-sm btn-success mb-1"><i class="fa fa-check"></i></button>
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
