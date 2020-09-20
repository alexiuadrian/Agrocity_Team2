@extends('layout')

@section('content')
    <div id="wrapper">
        <h1>New article</h1>
        <form action="/articles" method="POST">
            @csrf
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input class="input @error('title') is-danger @enderror "  type="text" name="title" id="title">
                    @if($errors->has('title'))
                    <p>{{$errors->first('title')}}</p>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea @error('excerpt') is-danger @enderror " name="excerpt"
                              id="excerpt"></textarea>
                    @error('excerpt')
                    <p>{{$errors->first('excerpt')}}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea @error('body') is-danger @enderror " name="body" id="body"></textarea>
                    @error('body')
                    <p>{{$errors->first('body')}}</p>
                    @enderror
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
