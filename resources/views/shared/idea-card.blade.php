<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#">Mario</a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('idea.delete', $idea->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="mx-2" href="{{ route('idea.show', $idea->id) }}">View</a>
                    <a href="{{ route('idea.edit', $idea->id) }}">Edit</a>
                    <button class="btn btn-danger btn-sm"> X </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            @if ($editing ?? false)
                <div class="row">
                    <form action="{{ route('idea.update', $idea->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <textarea class="form-control" name="content" id="content" rows="3">{{ $idea->content }}</textarea>
                            @error('content')
                                <span class="fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-dark"> Update </button>
                        </div>
                    </form>
                </div>
            @else
                {{ $idea->content }}
            @endif
        </p>
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1"></span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>{{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comment-box')
    </div>
</div>
<br>