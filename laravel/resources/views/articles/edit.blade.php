@extends('layout')

@section('content')
    <h1>Update article</h1>
    <div id="wrapper">
        <h1>New article</h1>
        <form action="/articles" method="PUT">
            @csrf
            <div class="field">
                <label class="label" for="">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt" value="{{$article->excerpt}}"></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body" value="{{$article->value}}"></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
