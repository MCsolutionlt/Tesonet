@extends('home')

@section('info')
    @foreach($repository as $repo)
        <div class="row">
            <div class="col-sm-12 p-3">
                <div class="row rounded bg-white p-3">
                    <div class="col-sm-2">
                        <img src="{{ $repo->owner->avatar_url }}" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="col-sm-10">
                        <h3><a href="{{ route('repos', ['user' => $repo->owner->login, 'repos' => $repo->name]) }}" title="{{ $repo->name }}">{{ $repo->name }}</a></h3>
                        <p>Created at {{ \Carbon\Carbon::parse($repo->created_at) }} | Open issues {{ $repo->open_issues_count }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection