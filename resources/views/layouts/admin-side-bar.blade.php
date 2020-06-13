
@section('sidebar')
    @auth
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">
                    Settings
                </li>
                <li class="list-group-item">
                    <a href="{{Route('home')}}">Dashborde</a>
                </li>
                <li class="list-group-item">
                    <a href="{{Route('categories.index')}}">Categories</a>
                </li>                            
                <li class="list-group-item">
                    <a href="{{Route('tags.index')}}">Tags</a>
                </li>
                @if (auth()->user()->isAdmin())
                    <li class="list-group-item">
                        <a href="{{Route('user.index')}}">Users</a>
                    </li>
                @endif
                <li class="list-group-item">
                    <a href="{{Route('posts.index')}}">Posts</a>
                </li>
                
            </ul>
        </div>
    @endauth
@endsection
