@extends('layouts.app')

@section('content')
Bienvenue
    {{-- @foreach (auth()->user()->notifications as $notification)
                            {{ $notification->created_at . ', ' . $notification->type . ', ' . $notification->data['email'] }}
                        @endforeach --}}
@endsection
