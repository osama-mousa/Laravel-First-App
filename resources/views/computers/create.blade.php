@extends('layout.master')

@section('title', 'Create Computer')

@section('contant')
    <div class="relative min-h-screen flex flex-col items-center justify-center w-full max-w-2xl px-6 lg:max-w-7xl">
        <div class="flex lg:justify-center">
            <h1>Create New Computer</h1>
        </div>
        <div class="flex lg:justify-center">
            <form action="{{ route('computers.store') }}" method="POST">
                @csrf
                <div>
                    <label for="computer-name">Computer Name</label>
                    <input id="computer-name" name="computer-name" value="{{ old('computer-name') }}" type="text">
                    @error('computer-name')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="computer-origin">Computer Origin</label>
                    <input id="computer-origin" name="computer-origin" value="{{ old('computer-origin') }}" type="text">
                    @error('computer-origin')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="computer-price">Computer Price</label>
                    <input id="computer-price" name="computer-price" value="{{ old('computer-price') }}" type="text">
                    @error('computer-price')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
