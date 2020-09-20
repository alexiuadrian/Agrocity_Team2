@extends('layout')
@section('content')
@forelse($articles as $article)
    <div class="content">
        <div class="title">
            <h2>
                <a href="{{$article->path()}}">
                    {{$article->title}}
                </a>
            </h2>
        </div>

    <p>
        <img src="banner.jpg" alt="" class="image image-full">
    </p>

    {!! $article->excerpt !!}
    </div>
@empty
<p>No relevant articles yet.</p>

@endforelse
@endsection
