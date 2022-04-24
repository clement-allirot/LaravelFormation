@extends('layouts.app')

@section('content')

    <h1>Liste des articles</h1>
    @if($posts->count() > 0)
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        @foreach($posts as $cle => $post)
        <tr>
            <td>{{ $post->title}}</td>
            <td><a class="underlineNone" href="{{route('show', $post->id)}}">{{ $post->content}}</a> </td>
            <td>{{date('d M y à H:i:s', strtotime($post->created_at))}}</td>
            <td>{{date('d M y à H:i:s', strtotime($post->updated_at))}}</td>
        </tr>
        @endforeach
    </table>
    @else
        <span>Aucun post en base</span>
    @endif
@endsection
