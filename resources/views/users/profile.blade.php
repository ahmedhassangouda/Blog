<!DOCTYPE html>
<html lang="en">
@section('title')
{{$user->name}}
@endsection
@include('layouts.header')
<body>
@include('layouts.navbar')
    <div class="container">
        <div class="row">
            <img src="{{asset('storage/site-images/cover.jpg')}}" class="img-fluid profile-cover">
            <div style="margin-top: -200px">
                @if(Auth::user()->profile->pic !== NULL)
                <img src="{{asset('storage/'.$user->profile->pic)}}" class="pull-left profilepic">
                @else
                <img src="{{$user->getAvatar($user->gander)}}" class="img-thumbnail pull-left" width='200px' style="border-radius: 50%;">
                @endif
                <h1 class="pull-left font-weight-bold" style="margin-top: 150px; color: #fff;">{{$user->name}}</h1>
            </div>            
        </div>
        <div class="row justfy-content-center my-5">
            <div class="col-md-4 ">
                
                <div class="card bg-light sticky-top">
                    <div class="card-header font-weight-bold"> 
                        Personal Info
                        @if (Auth::user()->id == $user->id)
                        <a href="{{Route('profile.edit' , Auth::user()->id)}}" class=" btn btn-sm btn-primary font-weight-bold pull-right" style="color: #000"><i class="fa fa-edit "></i> Edit</a>
                        @endif
                    </div>
                    @if(
                    $user->profile->state == NULL && 
                    $user->profile->country == NULL &&
                    $user->profile->bio == NULL &&
                    $user->profile->fa == NULL &&
                    $user->profile->tw == NULL &&
                    $user->profile->gh == NULL &&
                    $user->profile->wapp == NULL &&
                    $user->profile->date_of_birth == NULL &&
                    $user->profile->state == NULL &&
                    $user->profile->country == NULL                
                    )
                        <div class="alert alert-danger m-4 text-center"><strong>No Informatio..!</strong></div>
                    @else
                        <ul class="list-group list-group">
                        @if($user->profile->bio !==NULL)
                        <li class="list-group-item text-center font-weight-bold">{{$user->profile->bio}}</li>
                        @endif
                        @if($user->profile->fa !==NULL)
                        <li class="list-group-item"><i class="fa fa-lg fa-facebook-square" style="color: #4267B2"></i> : {{$user->profile->fb}}</li>
                        @endif
                        @if($user->profile->tw !==NULL)
                        <li class="list-group-item"><i class="fa fa-lg fa-twitter-square" style="color: #1DA1F2"></i> : {{$user->profile->tw}}</li>
                        @endif
                        @if($user->profile->gh !==NULL)
                        <li class="list-group-item"><i class="fa fa-lg fa-github-square"></i> : {{$user->profile->gh}}</li>
                        @endif
                        @if($user->profile->wapp !==NULL)
                        <li class="list-group-item"><i class="fa fa-lg fa-whatsapp" style="color: #57F676"></i> :@if($user->profile->wapp !== NULL) +20 @endif{{$user->profile->wapp}}</li>
                        @endif
                        @if($user->profile->date_of_birth !==NULL)
                        <li class="list-group-item"><i class="fa fa-lg fa-calendar" style="color: #ff5e00"></i> : {{$user->profile->date_of_birth}}</li>
                        @endif
                        @if($user->profile->state !==NULL && $user->profile->country !==NULL)
                        <li class="list-group-item"><i class="fa fa-lg fa-map-marker" style="color: #E20000"></i> :  {{$user->profile->state}},{{$user->profile->country}}</li>         
                        @endif
                        </ul>
                    @endif
                </div>
            </div>
            <div class="col-md-8 container">
                <div class="card bg-light">
                    <div class="card-header font-weight-bold">
                        About Me
                    </div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">{{$user->profile->about}}</h5>
                    </div>
                </div>
                <div class="d-flex justify-content-between my-3">                    
                    <div>
                        <a href="#">
                            <div class="card">
                                <img src="https://scx2.b-cdn.net/gfx/news/hires/2018/location.jpg" class="card-img-top" alt="...">
                                <hr>
                                <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>                
                        </a>                        
                    </div>                                                      
                </div>            
            <div class="text-center">
                <div class="card bg-light">
                    <div class="card-header font-weight-bold">Join To Bolg</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">Join In {{$user->created_at->format('d M Y')}}</h5>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
