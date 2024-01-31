<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home.page') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('home.page') }}">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('feed') }}">
                        <span>News Feed</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('terms') }}">
                        <span>Terms</span></a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            @auth
                <a class="btn btn-link btn-sm" href="{{ route('users.show',  auth()->id()) }}">View Profile </a>
            @endauth
        </div>
    </div>
</div>