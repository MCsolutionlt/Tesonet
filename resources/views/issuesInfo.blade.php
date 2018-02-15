@extends('home')

@section('info')
        <div class="row">
            <div class="col-sm-12 p-3">
                <div class="row rounded bg-white p-3">
                    <div class="col-sm-10">
                        <h3>{{ $issues->title }} ({{ $issues->state }})</h3>
                        <p>{{ $issues->body }}</p>
                        <p>Created by {{ $issues->user->login }} at {{ \Carbon\Carbon::parse($issues->created_at) }}</p>
                        <p>Comments {{ $issues->comments }}</p>
                        <div class="col-sm-12">
                            <a href="{{ route('repos', ['user' => \Request::segment(2), 'repos' => \Request::segment(3)]) }}" title="Back">Back to issues</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($comments as $comment)
            <div class="row">
                <div class="col-sm-12 p-3">
                    <div class="row rounded bg-white p-3">
                        <div class="col-sm-2">
                            <img src="{{ $comment->user->avatar_url }}" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-sm-10">
                            <p>Created by {{ $comment->user->login }} at {{ \Carbon\Carbon::parse($comment->created_at) }}</p>
                            <div>
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection