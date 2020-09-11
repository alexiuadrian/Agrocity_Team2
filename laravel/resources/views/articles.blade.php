@extends('layout')

@section('content')
    @foreach($articles as $article)
    <div>
        <h3>{{$article->title}}</h3>
        <p>{{$article->body}}</p>
    </div>
    @endforeach
@endsection
