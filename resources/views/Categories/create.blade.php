@extends('layouts.app')

@section('content')
<h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name:</label><br>
        <input id="name" name="name" type="text" required><br><br>
        <button type="submit">Create</button>
    </form>

@endsection