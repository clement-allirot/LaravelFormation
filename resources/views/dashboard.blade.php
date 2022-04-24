@extends('layouts.app')



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in! <hr>
                        @foreach (auth()->user()->notifications as $notification)
                            {{ $notification->created_at . ', ' . $notification->type
                            . ', '. $notification->data['email'] }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
