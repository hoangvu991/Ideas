<div>
    <form action="{{ route('idea.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" name="content" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $item)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $item->user_id }}
                    </h6>
                    <small class="fs-6 fw-light text-muted">{{ $item->created_at }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                {{ $item->content }}
                </p>
            </div>
        </div>
        <hr>
    @endforeach
</div>
