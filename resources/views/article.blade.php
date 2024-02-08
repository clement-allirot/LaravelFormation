@extends('layouts.app')

@section('content')
<h1>Article  :  {{$post->title}}</h1>
        <table class="table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <tr>
            <td>{{ $post->title}}</td>
            <td>{{ $post->content}}</td>
            <td>{{$post->created_at->format('d/m/Y à H:i:s')}}</td>
            <td>{{$post->updated_at->format('d/m/Y à H:i:s')}}</td>
        </tr>
        <table>
    
    {{-- <img src="{{$post->image ? $post->image->path : 'https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found-300x225.jpg'}}" alt="{{'hello'}}">  --}}
    @empty(!$post->image)
        <img src="{{ Storage::url($post->image->path) }}" />
    @endempty
    <hr>
    <span>Nom de l'artiste de l'image : 
        @if(!empty($post->imageArtist))
            {{$post->imageArtist->name}}
        @else
            Aucun
        @endif 
    </span>

    <hr>
    <h3>Tags </h3>
    @forelse($post->tags as $tag)
        <div>{{$tag->name}} | crée le {{$tag->created_at->format('d/m/Y à H:i:s')}}</div>
    @empty
        <div>Aucun tag pour cet article</div>
    @endforelse

    <hr>
    <h3>Commentaires </h3>
    @forelse($post->comments as $comment)
            <div>{{$comment->body}} | crée le {{$comment->created_at->format('d/m/Y à H:i:s')}}</div>
    @empty
        <div>Aucun commentaire pour cet article</div>
    @endforelse

     <hr>
    <h3>Vidéos </h3>
    @if(isset($video))
        @forelse($video->comments as $comment)
                <div>{{$video->url}} {{$comment->body}} | crée le {{$comment->created_at->format('d/m/Y à H:i:s')}}</div>
        @empty
            <div>Aucun commentaire pour cette vidéo</div>
        @endforelse 
    @endif 

    <hr>

    <button type="button"
    onclick="location.href='{{route('showAll')}}'" class="btn btn-primary">
    Liste des articles <span class="badge badge-light">{{$countPosts}}</span>
@endsection
