@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="well">
            <form role="form" action="/article/new/" method="POST">
                {{ csrf_field() }}
                Tittel
                <input name="title" value="" class="form-control"><br>
                Bilde
                <input name="image" value="http://placehold.it/900x300" class="form-control"><br>
                <div class="form-group">
                    Beskrivelse
                    <textarea name="description" class="form-control rich" rows="2"></textarea><br>
                    Innhold
                    <textarea name="body" class="form-control rich" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Lagre</button>
            </form>
        </div>

        <div id="editor"></div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Artikkel</th>
                        <th>Dato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Article::all() as $article)
                        <tr class="clickable-row" data-href="/article/edit/{{ $article->id }}">
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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