@extends('home')

@section('info')
        <div class="row">
            <div class="col-sm-12 p-3">
                <div class="row rounded bg-white p-3">
                    <div class="col-sm-2">
                        <img src="{{ $repository->owner->avatar_url }}" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="col-sm-10">
                        <h3>{{ $repository->name }}</h3>
                        <p>Created at {{ \Carbon\Carbon::parse($repository->created_at) }} | Open issues {{ $repository->open_issues_count }} | Closed issues {{ $count_issues_closed }}</p>
                        <div class="col-sm-12">
                            <a href="{{ route('home') }}" title="Back">Back to Repositories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($issues as $issue)
            <div class="row">
                <div class="col-sm-12 p-3">
                    <div class="row rounded bg-white p-3">
                        <div class="col-sm-10">
                            <h3><a href="{{ route('issues', ['user' => \Request::segment(2), 'repos' => \Request::segment(3), 'id' => $issue->number]) }}" title="{{ $issue->title }}">{{ $issue->title }} ({{ $issue->state }})</a></h3>
                            <p>Created by {{ $issue->user->login }} at {{ \Carbon\Carbon::parse($issue->created_at) }}</p>
                            <p>Comments {{ $issue->comments }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection