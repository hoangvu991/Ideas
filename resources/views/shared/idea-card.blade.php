<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user_id) }}">{{ $idea->user->name }}</a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="mx-2" href="{{ route('ideas.show', $idea->id) }}">View</a>
                    @can('update', $idea)
                    <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    @endcan
                    @can('delete', $idea)
                        <button class="btn btn-danger btn-sm"> X </button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            @if ($editing ?? false)
                <div class="row">
                    <form action="{{ route('ideas.update', $idea->id) }}" method="post">
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
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span> {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('shared.comment-box')
    </div>
</div>
<br>