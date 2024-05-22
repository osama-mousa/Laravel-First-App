@extends('layout.master')

@section('title', 'Show Computer')

@section('contant')
    <div class="relative min-h-screen flex flex-col items-center justify-center w-full max-w-2xl px-6 lg:max-w-7xl">
        <div class="flex lg:justify-center">
            <h1>Computer</h1>
        </div>
        <div class="mt-8 lg:justify-center bg-slate-950 ">
            {{-- {{ $computer['price'] }} --}}
            <h3>{{ $computer['name'] }} ({{ $computer['origin'] }}) <strong> - {{ $computer['price'] }}$</strong> </h3>
        </div>
        <a class="edit-btn" href="{{ route('computers.edit', $computer->id) }}">Edit</a>
        <form action="{{ route('computers.destroy', $computer->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="delete-btn" type="submit" value="delete">
        </form>
    </div>
@endsection
