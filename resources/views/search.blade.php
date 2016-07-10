@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <!-- Title -->
        <h1>Resultat</h1>



        <table class="table">
            <thead>
                <tr>
                    <th>Artikkel</th>
                    <th>Dato</th>
                </tr>
            </thead>
            <tbody>
                @foreach($searchResult as $article)
                    <tr class="clickable-row" data-href="/article/{{ $article->id }}">
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection