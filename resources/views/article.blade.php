@extends('layouts.app')

@section('content')

    <style>
        .lead {
            font-size: 14px;
        }
    </style>

    <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Title -->
                <h2>{{ $article->title }}</h2>

                <!-- Author -->
                <p class="lead">
                    Skrevet av <a href="#">{{ $article->author->name }}</a>
                    @if (Auth::user())
                        @if (\App\User::find(Auth::user()->id)->admin > 0)
                            <a href="/article/edit/{{ $article->id }}"><span class="glyphicon glyphicon glyphicon-edit" style="color: #333;"></span></a>
                        @endif
                    @endif
                </p>


                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> {{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ $article->image }}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{!! $article->description !!}</p>
                {!! $article->body !!}
                <hr>

                <!-- Blog Comments -->
                <!-- Comments Form -->
                <div class="well">
                    @if (Auth::guest())
                        <div>Du må være logget inn for å legge til kommentarer</div>
                    @else
                        <h4>Kommenter:</h4>
                        <form role="form" action="/article/comment/{{ $article->id }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Ferdig</button>
                        </form>
                    @endif

                </div>

                <hr>

                <!-- Posted Comments -->
                <!-- Comment -->
                @foreach($article->comments as $comment)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a> 
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->author->name }}
                                <small>{{ $comment->created_at }}</small>
                            </h4>
                            {{ $comment->body }}
                        </div>
                    </div>
                @endforeach
            </div>
@endsection