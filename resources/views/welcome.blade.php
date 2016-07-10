@extends('layouts.app')

@section('content')

<style>
    .lead {
        font-size: 14px;
    }
</style>

<!-- Blog Entries Column -->
            <div class="col-md-8">

                @foreach (\App\Article::orderBy('id', 'desc')->get() as $article)
                    <h2>
                        {{ $article->title }}
                    </h2>
                    <p class="lead">
                        Skrevet av <a href="index.php">{{ $article->author->name }}</a>
                        @if (Auth::user())
                            @if (\App\User::find(Auth::user()->id)->admin > 0)
                                <a href="/edit/{{ $article->id }}"><span class="glyphicon glyphicon glyphicon-edit" style="color: #333;"></span></a>
                            @endif
                        @endif
                    </p>
                        <p><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</p>
                    <hr>
                    <img class="img-responsive" src="{{ $article->image }}" style="max-height: 300px;" alt="">
                    <br>
                    <p>{!! $article->description !!}</p>
                    <a class="btn btn-primary" href="/article/{{ $article->id }}">Les mer <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                @endforeach

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
@endsection