@auth
<h4>{{ __('ideas.share') }}</h4>
<div class="row">
    <form action="{{ url('/ideas') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            @error('content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> {{ __('ideas.share_idea') }} </button>
        </div>
    </form>
</div>
@endauth

@guest
<h4>{{ __('ideas.login_to_share') }}</h4>
@endguest
