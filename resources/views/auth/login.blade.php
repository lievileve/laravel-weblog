@extends('layouts.app')

@section('title', 'Login')

@section('content')
<form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required autocomplete="off">
        </div>
        <div>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required autocomplete="off">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection