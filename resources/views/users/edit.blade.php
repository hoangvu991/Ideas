@extends('layout.layout')
@section('content')
    <div class="row">
        @include('shared.sidebar')
        <div class="col-8" style="margin-top: -10px">
            @include('shared.success-msg')
            <div class="mt-3">
                @include('shared.user-edit')
            </div>
            <hr>
            <div class="mt-3">
                @forelse ($ideas as $idea)
                    @include('shared.idea-card')
                @empty
                    <div class="mt-3 text-center">
                        {{ __('ideas.no_post') }}
                    </div>
                @endforelse
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

