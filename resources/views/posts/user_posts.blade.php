@extends('layouts.app')

@section('content')

        <h1>My Posts</h1>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date published</th>
                        <th>Edit Post</th>
                        <th>Delete Post</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

@endsection