<div class="card">
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageUrl() }}" alt="Mario Avatar">
                    <div>
                        <h3 class="card-title mb-0"> <input type="text" name="name" class="form-control"
                                value="{{ $user->name }}"></h3>
                        @error('name')
                            <span class="fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h3>Profile Image</h3>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <p class="fs-6 fw-light">
                    <textarea class="form-control" name="bio" id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </p>
                <button type="submit" class="mb-2 btn btn-success">Save</button>

                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span>{{ $user->ideas()->count() }}</a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>
                @auth
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth

            </div>
        </div>
    </form>
</div>
