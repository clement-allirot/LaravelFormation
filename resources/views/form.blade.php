@extends('layouts.app')

@section('content')

<h1>Créer un article</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div style="color:red;">{{$error}}</div>
    @endforeach
@endif

<form action="{{route('posts.store')}}" method="POST"
enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-5">
            <input placeholder="titre" type="text" name="title" class="form-control">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <div class="col-sm-8">
            <textarea placeholder="contenu" name="content" class="form-control" id="" ></textarea>
        </div>    
    </div>
    <label for="avatar"></label>
    <br>
    <input type="file" 
       id="avatar" name="avatar"
       accept="image/png, image/jpeg">
    <br>
    <div>
    <input type="checkbox" id="scales" name="scales"
            checked>
    <label for="scales">Scales</label>
    </div>

    <div>
    <input type="checkbox" id="horns" name="horns">
    <label for="horns">Horns</label>
    </div>

    <br>
    
    <button class="btn btn-success" type="submit">Soumettre</button>
</form>

@endsection