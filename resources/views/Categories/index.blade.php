@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    <table>
        <thead>
            <tr>
                <th>Category Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <br><br>

    <a href="{{ route('categories.create') }}">Add Category</a>

@endsection
   
