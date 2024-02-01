@auth
    @if (Auth::user()->likeIdea($idea))
        <form action="{{ route('ideas.unlike', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1"></span>
                    {{ $idea->likes_count }} </button>
            </div>
        </form>
    @else
        <form action="{{ route('ideas.like', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1"></span>
                    {{ $idea->likes_count }} </button>
            </div>
        </form>
    @endif
@endauth
@guest
    <div class="mb-3">
        <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1"></span>
            {{ $idea->likes_count }} </button>
    </div>
@endguest
