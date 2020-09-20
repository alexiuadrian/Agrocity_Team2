@extends('layout')

@section('content')
    @foreach($articles as $article)
    <div class="style1">
        <a href="{{route('articles.show', $article)}}">
            <h3 class="first">{{$article->title}}</h3>
        </a>
        <p>
            {{$article->excerpt}}
        </p>
    </div>
    @endforeach
@endsection
