@extends('layout')

@section('content')
    <div id="wrapper">
        <h1>New article</h1>
        <form action="/articles" method="POST">
            @csrf
            <div class="field">
                <label class="label" for="">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title">
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt"></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" id="body"></textarea>
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
