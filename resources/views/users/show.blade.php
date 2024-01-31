@extends('layout.layout')
@section('content')
    <div class="row">
        @include('shared.sidebar')
        <div class="col-8">
            @include('shared.success-msg')
            <div class="mt-3">
                @include('shared.user-card')
            </div>
            <hr>
            <div class="mt-3">
                @forelse ($ideas as $idea)
                    @include('shared.idea-card')
                @empty
                    <div class="mt-3 text-center">
                        No Post Result
                    </div>
                @endforelse
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

