@extends('layout.layout')
@section('content')
    <div class="row">
        @include('shared.sidebar')
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta ipsam molestiae et ducimus voluptatibus
                doloremque recusandae. Corporis perspiciatis laboriosam perferendis harum mollitia, debitis sint possimus
                fugiat praesentium soluta doloremque? In!
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection