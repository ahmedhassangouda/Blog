<!DOCTYPE html>
<html lang="en">
@section('title')
{{Auth::user()->name}}
@endsection
@include('layouts.header')
<body>
@include('layouts.navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update' , Auth::user()->profile->id )}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
                            <div class="col-md-6">
                                <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ Auth::user()->profile->bio}}">

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">About Me</label>
                            <div class="col-md-6">
                                <input id="about" type="text" class="form-control @error('about') is-invalid @enderror" name="about" value="{{ Auth::user()->profile->about}}">

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Birthday</label>
                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ Auth::user()->profile->date_of_birth}}">

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fb" class="col-md-4 col-form-label text-md-right">Facebook</label>
                            <div class="col-md-6">
                                <input id="fb" type="text" class="form-control @error('fb') is-invalid @enderror" name="fb" value="{{ Auth::user()->profile->fb}}">

                                @error('fb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tw" class="col-md-4 col-form-label text-md-right">Twitter</label>
                            <div class="col-md-6">
                                <input id="tw" type="text" class="form-control @error('tw') is-invalid @enderror" name="tw" value="{{ Auth::user()->profile->tw}}">

                                @error('tw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gh" class="col-md-4 col-form-label text-md-right">Github</label>
                            <div class="col-md-6">
                                <input id="gh" type="text" class="form-control @error('gh') is-invalid @enderror" name="gh" value="{{ Auth::user()->profile->gh}}">

                                @error('gh')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wapp" class="col-md-4 col-form-label text-md-right">Whatsapp</label>
                            <div class="col-md-6">
                                <input id="wapp" type="number" class="form-control @error('wapp') is-invalid @enderror" name="wapp" value="{{ Auth::user()->profile->wapp}}">

                                @error('wapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right mr-2">Location</label>
                            <div class="col-md-6 row">
                                <input id="state" type="text" class="form-control col-md-5 ml-2 mr-4 @error('state') is-invalid @enderror" name="state" value="{{ Auth::user()->profile->state}}">
                                <input id="country" type="text" class="form-control col-md-5 @error('country') is-invalid @enderror" name="country" value="{{ Auth::user()->profile->country}}">

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Profile Picture" class="col-md-4 col-form-label text-md-right">Profile Picture</label>
                            <div class="col-md-6">
                                <input id="Profile Picture" type="file" class="form-control @error('pic') is-invalid @enderror" name="pic" value="{{ Auth::user()->profile->pic}}">

                                @error('pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    save
                                </button>                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
