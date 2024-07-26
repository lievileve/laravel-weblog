@extends('layouts.app')

@section('title', 'Index')

@section('content')
<h1>Posts</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date published</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="category_filter">
        <form action="{{ route('posts.index') }}" method="GET">
            <label for="filter">Select category to filter posts</label>
            <select id="categories" name="category_id">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br><br>
            <button type="submit">Filter</button>
        </form>
    </div>



@endsection