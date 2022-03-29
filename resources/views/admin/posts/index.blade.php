@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="d-flex justify-content-between">
            <h1>I miei post</h1>
            <a href="{{ route('admin.posts.create') }}">
                <button class="btn btn-success"><i class="fa-solid fa-plus"></i> Create New Post</button>
            </a>
        </header>
        @include('includes.posts.alert')
        <main>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}">
                                    <button class="btn btn-sm btn-warning mx-2" type="submit">
                                        <i class="fas fa-pencil"></i>
                                    </button>
                                    </a>

                                    <a href="{{ route('admin.posts.show', $post->id) }}"><button
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i></button></a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-sm btn-danger mx-2" type="submit">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <h3>Non ci sono post da mostrare</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if($posts->hasPages())
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
            @endif
        </main>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/delete-form.js') }}"></script>
@endsection