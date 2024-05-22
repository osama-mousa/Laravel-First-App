@extends('layout.master')

@section('title', 'Computers')

@section('contant')
    <div class="relative min-h-screen flex flex-col items-center justify-center w-full max-w-2xl px-6 lg:max-w-7xl">
        <div class="flex lg:justify-center">
            <h1>Computers</h1>
        </div>
        <div class="mt-8 flex lg:justify-center bg-black">
            @if (count($computers) > 0)
                <ul>
                    @foreach ($computers as $computer)
                        <a href="{{ route('computers.show', ['computer' => $computer['id']]) }}">
                            <li>
                                {{ $computer['name'] }} ( {{ $computer['origin'] }} ) <strong> - {{ $computer['price'] }}$</strong>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @else
                <p>There are no Computers to display</p>
            @endif
        </div>
    </div>
@endsection
