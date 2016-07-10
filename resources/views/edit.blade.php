@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <!-- Title -->
        <h1>Endre</h1>


        <div class="well">
            <form role="form" action="/article/edit/{{ $article->id }}" method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                Tittel
                <input name="title" value="{{ $article->title }}" class="form-control"><br>
                Bilde
                <input name="image" value="{{ $article->image }}" class="form-control"><br>
                <div class="form-group">
                    Beskrivelse
                    <textarea name="description" class="form-control rich" rows="4">{{ $article->description }}</textarea>
                </div>
                <div class="form-group">
                    Innhold
                    <textarea name="body" class="form-control rich" rows="20">{{ $article->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Lagre</button>
            </form>
        </div>


    </div>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({ 
            selector:'.rich',
            plugins: "image",
            toolbar: "image"
     });
</script>

@endsection